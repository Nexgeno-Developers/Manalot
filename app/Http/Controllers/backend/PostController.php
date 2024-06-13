<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PostController extends Controller
{
    // View all post statuses
    public function index_posts()
    {
        // Retrieve posts with author information, likes count, shares count, and comments count
        $posts = DB::table('posts as QC')
            ->join('users as QP', 'QC.author_id', '=', 'QP.id')
            ->leftJoin('post_likes as PL', 'QC.id', '=', 'PL.post_id')
            ->leftJoin('post_shares as PS', 'QC.id', '=', 'PS.post_id')
            ->leftJoin('post_comments as PC', 'QC.id', '=', 'PC.post_id')
            ->select(
                'QC.id',
                'QC.author_id',
                'QC.content',
                'QC.event',
                'QC.image_url',
                'QC.status',
                'QC.created_at',
                'QC.updated_at',
                'QP.username',
                DB::raw('COUNT(DISTINCT PL.id) as likes_count'),
                DB::raw('COUNT(DISTINCT PS.id) as shares_count'),
                DB::raw('COUNT(DISTINCT PC.id) as comments_count')
            )
            ->groupBy('QC.id', 'QP.username', 'QC.author_id', 'QC.content', 'QC.event', 'QC.image_url', 'QC.status', 'QC.created_at', 'QC.updated_at')
            ->get();

        // Convert created_at fields to Carbon instances
        $posts->transform(function ($post) {
            $post->created_at = Carbon::parse($post->created_at);
            return $post;
        });

        return view('backend.pages.posts.index', compact('posts'));
    }


    // Likes Functionality
    public function likes_post($id)
    {
        $likes = DB::table('post_likes')
                    ->join('users', 'post_likes.user_id', '=', 'users.id')
                    ->select('users.username', 'post_likes.created_at')
                    ->where('post_likes.post_id', $id)
                    ->get();

        return view('backend.pages.posts.likes', compact('likes'));
    }

    // Comments Functionality
    public function comments_post($id)
    {
        // Fetch comments for the post and arrange them in a hierarchical format
        $comments = $this->getComments($id);
    
        return view('backend.pages.posts.comments', compact('comments'));
    }
    
    private function getComments($postId, $parentId = null, $level = 0)
    {
        $comments = DB::table('post_comments')
                    ->join('users', 'post_comments.user_id', '=', 'users.id')
                    ->select('post_comments.*', 'users.username')
                    ->where('post_comments.post_id', $postId)
                    ->where('post_comments.parent_id', $parentId)
                    ->orderBy('post_comments.created_at', 'asc')
                    ->get();
    
        $result = [];
    
        foreach ($comments as $comment) {
            $comment->replies = $this->getComments($postId, $comment->id, $level + 1);
            $result[] = $comment;
        }
    
        return $result;
    }
    

    // Shares Functionality
    public function shared_post($id)
    {
        $shares = DB::table('post_shares')
                    ->join('users', 'post_shares.user_id', '=', 'users.id')
                    ->select('users.username', 'post_shares.created_at')
                    ->where('post_shares.post_id', $id)
                    ->get();

        return view('backend.pages.posts.shares', compact('shares'));
    }


    // Show the form for adding a new post status
    public function add_posts()
    {
        return view('backend.pages.posts.add');
    }

    // Create a new post status
    public function create_posts(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
            'event' => 'required|string|max:100',
            'image' => 'nullable|file|mimes:jpeg,webp,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }

        // Retrieve the authenticated admin user
        $author_id = auth()->user()->id;

        // Handle file uploads
        $imagePathPost = null;
        if ($request->hasFile('image')) {
            $imagePathPost = $request->file('image')->store('assets/image/post', 'public');
        }

        // Insert post data into the database
        $post = DB::table('posts')->insertGetId([
            'author_id' => $author_id,
            'content' => $request->input('content'),
            'event' => $request->input('event'),
            'status' => $request->input('status'),
            'image_url' => $imagePathPost,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($post) {
            $response = [
                'status' => true,
                'notification' => 'Post added successfully!',
            ];
        } else {
            $response = [
                'status' => false,
                'notification' => 'Error!',
            ];
        }

        return response()->json($response);
    }

    // Show the form for editing an existing post status
    public function edit_posts($id)
    {
        $posts = DB::table('posts')->where('id', $id)->first();
        return view('backend.pages.posts.edit', compact('posts'));
    }

    // View a specific post status
    public function view_posts($id)
    {
        // Fetch the post with author information, likes count, shares count, and comments count
        $post = DB::table('posts as QC')
            ->join('users as QP', 'QC.author_id', '=', 'QP.id')
            ->leftJoin('post_likes as PL', 'QC.id', '=', 'PL.post_id')
            ->leftJoin('post_shares as PS', 'QC.id', '=', 'PS.post_id')
            ->leftJoin('post_comments as PC', 'QC.id', '=', 'PC.post_id')
            ->select(
                'QC.id',
                'QC.author_id',
                'QC.content',
                'QC.event',
                'QC.image_url',
                'QC.status',
                'QC.created_at',
                'QC.updated_at',
                'QP.username',
                DB::raw('COUNT(DISTINCT PL.id) as likes_count'),
                DB::raw('COUNT(DISTINCT PS.id) as shares_count'),
                DB::raw('COUNT(DISTINCT PC.id) as comments_count')
            )
            ->where('QC.id', $id)
            ->groupBy('QC.id', 'QP.username', 'QC.author_id', 'QC.content', 'QC.event', 'QC.image_url', 'QC.status', 'QC.created_at', 'QC.updated_at')
            ->first();

        // Convert created_at and updated_at fields to Carbon instances
        if ($post) {
            $post->created_at = Carbon::parse($post->created_at);
            $post->updated_at = Carbon::parse($post->updated_at);
        }

        return view('backend.pages.posts.view', compact('post'));
    }

    // Update an existing post status
    public function update_posts(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:posts,id',
            'content' => 'required|string',
            'event' => 'required|string|max:255',
            'image' => 'nullable|file|mimes:jpeg,webp,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 422); // Use 422 for validation errors
        }

        $id = $request->input('id');

        // Retrieve the post by ID
        $post = DB::table('posts')->where('id', $id)->first();

        if (!$post) {
            return response()->json([
                'status' => false,
                'notification' => 'Post not found'
            ], 404);
        }

        // Retrieve the authenticated admin user
        $author_id = auth()->user()->id;

        // Handle file uploads
        $imagePathPost = $post->image_url;
        if ($request->hasFile('image')) {
            $imagePathPost = $request->file('image')->store('assets/image/post', 'public');
        }

        // Update the Post record using DB facade
        $affected = DB::table('posts')
            ->where('id', $id)
            ->update([
                'author_id' => $author_id,
                'content' => $request->input('content'),
                'event' => $request->input('event'),
                'status' => $request->input('status'),
                'image_url' => $imagePathPost,
                'updated_at' => now(),
            ]);

        if ($affected) {
            $response = [
                'status' => true,
                'notification' => 'Post updated successfully!',
            ];
        } else {
            $response = [
                'status' => false,
                'notification' => 'No changes made to the Post.',
            ];
        }

        return response()->json($response);
    }

    // Delete an existing post status
    public function delete_posts($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();

        if (!$post) {
            $response = [
                'status' => false,
                'notification' => 'Record not found!',
            ];
            return response()->json($response);
        }

        // Delete post record
        DB::table('posts')->where('id', $id)->delete();

        $response = [
            'status' => true,
            'notification' => 'Post deleted successfully!',
        ];

        return response()->json($response);
    }
}

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
        $posts = DB::table('posts as QC')
        ->join('users as QP', 'QC.author_id', '=', 'QP.id')
        ->select('QC.*', 'QP.username')->get();

        if ($posts) {
            $posts->created_at = Carbon::parse($posts->created_at);
        }

        return view('backend.pages.posts.index', compact('posts'));
    }

    // Show the form for adding a new post status
    public function add_posts()
    {
        return view('backend.pages.posts.add');
    }
    public function create_posts(Request $request) {
        
        // Validate form data
        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
            'event' => 'required|string|max:100',
            // 'MediaType' => 'required|string|in:image,video',
            'image' => 'nullable|file|mimes:jpeg,webp,png,jpg,gif|max:2048',
            // 'video' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:10240'
        ]);

        // Initialize variables for media paths
        $imagePathPost = null;
        $videoPathPost = null;

        // Handle file uploads
        if ($request->hasFile('image')) {
            $imagePathPost = $request->file('image')->store('assets/image/post', 'public');
        }

        if ($request->hasFile('video')) {
            $videoPathPost = $request->file('video')->store('assets/video/post', 'public');
        }

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        } 

        // Retrieve the authenticated admin user
        $author_id = auth()->user()->id;

        // Insert post data into the database
        $post = DB::table('posts')->insert([
            'author_id' => $author_id,
            'content' => $request->input('content'),
            'event' => $request->input('event'),
            'status' => $request->input('status'),
            'image_url' => $imagePathPost,
            // 'video_url' => $videoPathPost,
            // 'MediaType' => $request->input('MediaType') ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if($post){
            $response = [
                'status' => true,
                'notification' => 'post added successfully!',
            ];
        }
        else{
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
    public function view_posts($id)
    {
        // Fetch the post with author information
        $post = DB::table('posts as QC')
                    ->join('users as QP', 'QC.author_id', '=', 'QP.id')
                    ->select('QC.*', 'QP.username')
                    ->where('QC.id', $id)
                    ->first();

        return view('backend.pages.posts.view', compact('post'));
    }

    public function update_posts(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:posts,id',
            'content' => 'required|string',
            'event' => 'required|string|max:255',
            // 'MediaType' => 'required|string|in:image,video',
            'image' => 'nullable|file|mimes:jpeg,webp,png,jpg,gif|max:2048',
            // 'video' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:10240'
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
    
        // $checkMediaType = $post->MediaType;
        $imagePathPost = $post->image_url;
        // $videoPathPost = $post->video_url;
        
        // if ($request->MediaType !== $post->MediaType) {
        //     // Delete media and its associated path based on the previous media type
        //     if ($checkMediaType === 'image' && $imagePathPost) {
        //         \File::delete('storage/' .$imagePathPost);
        //         $imagePathPost = null; // Reset image path
        //     } elseif ($checkMediaType === 'video' && $videoPathPost) {
        //         \File::delete('storage/' .$videoPathPost);
        //         $videoPathPost = null; // Reset video path
        //     }
        // }
    
        // Upload new media if provided
        if ($request->hasFile('image')) {
            $imagePathPost = $request->file('image')->store('assets/image/post', 'public');
        }
        // if ($request->hasFile('video')) {
        //     $videoPathPost = $request->file('video')->store('assets/video/post', 'public');
        // }

        // Update the Post record using DB facade
        $affected = DB::table('posts')
            ->where('id', $id)
            ->update([
                'author_id' => $author_id,
                'content' => $request->input('content'),
                'event' => $request->input('event'),
                'status' => $request->input('status'),
                'image_url' => $imagePathPost,
                // 'video_url' => $videoPathPost,
                // 'MediaType' => $request->input('MediaType') ?? null,
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
        $post = DB::table('posts')->where('id', $id);
        if (!$post) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $post->delete();

        $response = [
            'status' => true,
            'notification' => 'post Deleted successfully!',
        ];

        return response()->json($response);
    }
}
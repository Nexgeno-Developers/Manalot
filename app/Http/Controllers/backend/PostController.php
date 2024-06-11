<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // View all post statuses
    public function index_post()
    {
        $posts = DB::table('posts as QC')
        ->join('users as QP', 'QC.author_id', '=', 'QP.id')
        ->select('QC.*', 'QP.username')->get();

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
                'name' => 'required|string|max:255',
                'status' => 'required|string|max:5'
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'notification' => $validator->errors()->all()
                ], 200);
            } 
    
            $post = DB::table('posts')->insert([
                'name' => $request->input('name'),
                'status' => $request->input('status')
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

    // Update an existing post status
    public function update_posts(Request $request)
    {

           // Validate form data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required|in:0,1', // Assuming status can only be 0 or 1
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 422); // Use 422 for validation errors
        } 

        $id = $request->input('id');

        // Update the user record using DB facade
        $affected = DB::table('posts')
        ->where('id', $id)
        ->update([
            'name' => $request->input('name'),
            'status' => $request->input('status')
        ]);

        if ($affected) {
            $response = [
                'status' => true,
                'notification' => 'Profile updated successfully!',
            ];
        } else {
            $response = [
                'status' => false,
                'notification' => 'Nothing to update in profile.',
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
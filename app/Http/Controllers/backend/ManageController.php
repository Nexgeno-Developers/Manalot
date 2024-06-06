<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ManageController extends Controller
{
    // View all experience statuses
    public function index_experience_status()
    {
        $experience_statuses = DB::table('experience_status')->get();
        return view('backend.pages.experience_status.index', compact('experience_statuses'));
    }

    // Show the form for adding a new experience status
    public function add_experience_status()
    {
        return view('backend.pages.experience_status.add');
    }
    public function create_experience_status(Request $request) {

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
    
            $experience = DB::table('experience_status')->insert([
                'name' => $request->input('name'),
                'status' => $request->input('status')
            ]);
        if($experience){
            $response = [
                'status' => true,
                'notification' => 'Experience added successfully!',
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

    // Show the form for editing an existing experience status
    public function edit_experience_status($id)
    {
        $experience_status = DB::table('experience_status')->where('id', $id)->first();
        return view('backend.pages.experience_status.edit', compact('experience_status'));
    }

    // Update an existing experience status
    public function update_experience_status(Request $request)
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
        $affected = DB::table('experience_status')
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

    // Delete an existing experience status
    public function delete_experience_status($id)
    {
        $experience = DB::table('experience_status')->where('id', $id);
        if (!$experience) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $experience->delete();

        $response = [
            'status' => true,
            'notification' => 'Experience successfully!',
        ];

        return response()->json($response);
    }
}
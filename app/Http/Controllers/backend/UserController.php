<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function userslist() {
        $users = User::all();
        return view('backend.pages.user.index', compact('users'));
    }  

    public function usersData() {
        $users = User::select('id', 'username', 'email', 'approval', 'status', 'created_at')->get();
        return response()->json($users);
    }    

    public function approvestatus(Request $request, $id) {
        $user = User::find($id);
    
        if (!$user) {
            return response()->json(['status' => false, 'notification' => 'User not found'], 404);
        }
    
        $user->approval = $request->input('approval');
        $user->save();
    
        return response()->json(['status' => true, 'notification' => 'Approval status updated successfully']);
    }
       

    public function edit($id) {
        $author = User::find($id);
        return view('backend.pages.user.edit', compact('author'));
    }

    public function update(Request $request) {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
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
        $affected = User::where('id', $id)
                        ->update([
                            'username' => $request->input('username'),
                            'email' => $request->input('email'),
                            'status' => $request->input('status'),
                        ]);

        if ($affected) {
            $response = [
                'status' => true,
                'notification' => 'Profile updated successfully!',
            ];
        } else {
            $response = [
                'status' => false,
                'notification' => 'Failed to update profile.',
            ];
        }

        return response()->json($response);
    }

    public function delete($id) {
        // Find the user
        $user = User::find($id);
    
        if (!$user) {
            return response()->json([
                'status' => false,
                'notification' => 'User not found.'
            ], 404); // User not found
        }
    
        // Delete the user
        $user->delete();
    
        return response()->json([
            'status' => true,
            'notification' => 'User deleted successfully!'
        ]);
    }
    

    public function password($id) {
        $author = User::find($id);
        return view('backend.pages.user.password_edit', compact('author'));
    } 
    
    public function reset(Request $request) {

        // Validate form data
        $validator = Validator::make($request->all(), [
            'password' => 'nullable|min:6|confirmed', // This ensures password and password_confirmation match
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }
    
        $id = $request->input('id');
        $author = User::find($id);

    
        // Update the password if it's provided
        if ($request->filled('password')) {
            $author->password =  bcrypt($request->input('password'));
        }
    
        $author->save();
    
        $response = [
            'status' => true,
            'notification' => 'Password Reset successfully!',
        ];
    
        return response()->json($response);
    }
}

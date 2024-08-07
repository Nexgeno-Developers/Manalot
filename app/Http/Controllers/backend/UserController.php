<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function resetPassword(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'notification' => 'Password reset Failed!']);
        }

        // Update the user's password
        $id = $request->id;
        $password = Hash::make($request->password);
        $user = User::where('role_id', '<>', 1)
                    ->where('id', '<>', 1)
                    ->where('id', $id)
                    ->first();

        if ($user) {
            $user->password = $password;
            $user->save();
            return response()->json(['status' => true, 'notification' => 'Password reset successfully!']);
        } else {
            return response()->json(['status' => false, 'notification' => 'Password reset Failed!']);
        }
    }

    public function userslist(Request $request) {
        // $query = User::where('role_id', '<>', 1)->where('completed_status', 1);

        $query = User::where('role_id', '<>', 1);
    
        // Apply filters if present
        if ($request->filled('user_name')) {
            $query->where('username', 'LIKE', '%' . $request->user_name . '%');
        }
    
        if ($request->filled('approval_status')) {
            $query->where('approval', $request->approval_status);
        }
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
    
    
        // Paginate the results
        $users = $query->paginate(10); // Adjust the number per page as needed
    
        return view('backend.pages.user.index', compact('users'));
    }
    

    public function approvestatus(Request $request, $id) {
        // Find the user by ID
        $user = User::find($id);
    
        // Check if user exists
        if (!$user) {
            return response()->json(['status' => false, 'notification' => 'User not found'], 404);
        }
    
        // Check if the user is not an admin (role_id != 1)
        $users2 = User::where('role_id', '<>', 1)->where('id', $id)->first();
        if (!$users2) {
            return response()->json(['status' => false, 'notification' => 'User not found or is an admin'], 404);
        }
    
        // Toggle the approval status
        $approvalstatus = $users2->approval;
        $newApprovalStatus = $approvalstatus ? 0 : 1; // Assuming approval is a boolean or binary flag
    
        // Update the user record with the new approval status
        $affected = User::where('id', $id)->update([
            'approval' => $newApprovalStatus,
            'status' => $newApprovalStatus,
        ]);
    
        if ($affected) {
            $response = [
                'status' => true,
                'notification' => 'Profile updated successfully!',
                'newApprovalStatus' => $newApprovalStatus // Include the new status in the response
            ];
        } else {
            $response = [
                'status' => false,
                'notification' => 'Failed to update profile.',
            ];
        }
    
        return response()->json($response);
    }
    
       

    public function view($id) {
        $viewuser = User::find($id);
        $usersdetails = DB::table('userdetails')->where('user_id', $id)->first();
        return view('backend.pages.user.view', compact('viewuser', 'usersdetails'));
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
            // 'status' => 'required|in:0,1', // Assuming status can only be 0 or 1
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
            // 'status' => $request->input('status'),
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
        $user = User::find($id);
        if (!$user) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $user->delete();

        $response = [
            'status' => true,
            'notification' => 'User delete successfully!',
        ];

        return response()->json($response);
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

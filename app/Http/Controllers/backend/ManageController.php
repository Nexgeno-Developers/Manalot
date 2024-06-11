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
            'notification' => 'Experience Deleted successfully!',
        ];

        return response()->json($response);
    }
    // Industry 
    public function index_industry()
    {
        $industry = DB::table('industry')->get();
        return view('backend.pages.industry.index', compact('industry'));
    }

    // Show the form for adding a new Industry
    public function add_industry()
    {
        return view('backend.pages.industry.add');
    }
    public function create_industry(Request $request) {

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
    
            $industry = DB::table('industry')->insert([
                'name' => $request->input('name'),
                'status' => $request->input('status')
            ]);
        if($industry){
            $response = [
                'status' => true,
                'notification' => 'Industry added successfully!',
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

    // Show the form for editing an existing Industry
    public function edit_industry($id)
    {
        $industry = DB::table('industry')->where('id', $id)->first();
        return view('backend.pages.industry.edit', compact('industry'));
    }

    // Update an existing Industry
    public function update_industry(Request $request)
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
        $affected = DB::table('industry')
        ->where('id', $id)
        ->update([
            'name' => $request->input('name'),
            'status' => $request->input('status')
        ]);

        if ($affected) {
            $response = [
                'status' => true,
                'notification' => 'Industry updated successfully!',
            ];
        } else {
            $response = [
                'status' => false,
                'notification' => 'Nothing to update in Industry.',
            ];
        }

        return response()->json($response);
    }

    // Delete an existing experience status
    public function delete_industry($id)
    {
        $experience = DB::table('industry')->where('id', $id);
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
            'notification' => 'Industry Deleted successfully!',
        ];

        return response()->json($response);
    }


    // Job Title 
    public function index_job_title()
    {
        $job_title = DB::table('job_title')->get();
        return view('backend.pages.job_title.index', compact('job_title'));
    }

    // Show the form for adding a new Job Title
    public function add_job_title()
    {
        return view('backend.pages.job_title.add');
    }
    public function create_job_title(Request $request) {

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
    
            $job_title = DB::table('job_title')->insert([
                'name' => $request->input('name'),
                'status' => $request->input('status')
            ]);
        if($job_title){
            $response = [
                'status' => true,
                'notification' => 'Job Title added successfully!',
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
    public function edit_job_title($id)
    {
        $job_title = DB::table('job_title')->where('id', $id)->first();
        return view('backend.pages.job_title.edit', compact('job_title'));
    }

    // Update an existing experience status
    public function update_job_title(Request $request)
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
        $affected = DB::table('job_title')
        ->where('id', $id)
        ->update([
            'name' => $request->input('name'),
            'status' => $request->input('status')
        ]);

        if ($affected) {
            $response = [
                'status' => true,
                'notification' => 'Job Title updated successfully!',
            ];
        } else {
            $response = [
                'status' => false,
                'notification' => 'Nothing to update in Job Title.',
            ];
        }

        return response()->json($response);
    }

    // Delete an existing Job Title status
    public function delete_job_title($id)
    {
        $job_title = DB::table('job_title')->where('id', $id);
        if (!$job_title) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $job_title->delete();

        $response = [
            'status' => true,
            'notification' => 'Job Title Deleted successfully!',
        ];

        return response()->json($response);
    }


    // References From
    public function index_references_from()
    {
        $references_from = DB::table('references_from')->get();
        return view('backend.pages.references_from.index', compact('references_from'));
    }

    // Show the form for adding a new References From
    public function add_references_from()
    {
        return view('backend.pages.references_from.add');
    }
    public function create_references_from(Request $request) {

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
    
            $references_from = DB::table('references_from')->insert([
                'name' => $request->input('name'),
                'status' => $request->input('status')
            ]);
        if($references_from){
            $response = [
                'status' => true,
                'notification' => 'References From added successfully!',
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
    public function edit_references_from($id)
    {
        $references_from = DB::table('references_from')->where('id', $id)->first();
        return view('backend.pages.references_from.edit', compact('references_from'));
    }

    // Update an existing experience status
    public function update_references_from(Request $request)
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
        $affected = DB::table('references_from')
        ->where('id', $id)
        ->update([
            'name' => $request->input('name'),
            'status' => $request->input('status')
        ]);

        if ($affected) {
            $response = [
                'status' => true,
                'notification' => 'References From updated successfully!',
            ];
        } else {
            $response = [
                'status' => false,
                'notification' => 'Nothing to update in References From.',
            ];
        }

        return response()->json($response);
    }

    // Delete an existing References From status
    public function delete_references_from($id)
    {
        $references_from = DB::table('references_from')->where('id', $id);
        if (!$references_from) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $references_from->delete();

        $response = [
            'status' => true,
            'notification' => 'References From Deleted successfully!',
        ];

        return response()->json($response);
    }
    // Skills
    public function index_skills()
    {
        $skills = DB::table('skills')->get();
        return view('backend.pages.skills.index', compact('skills'));
    }

    // Show the form for adding a new Skills
    public function add_skills()
    {
        return view('backend.pages.skills.add');
    }
    public function create_skills(Request $request) {

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
    
            $skills = DB::table('skills')->insert([
                'name' => $request->input('name'),
                'status' => $request->input('status')
            ]);
        if($skills){
            $response = [
                'status' => true,
                'notification' => 'Skills added successfully!',
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
    public function edit_skills($id)
    {
        $skills = DB::table('skills')->where('id', $id)->first();
        return view('backend.pages.skills.edit', compact('skills'));
    }

    // Update an existing experience status
    public function update_skills(Request $request)
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
        $affected = DB::table('skills')
        ->where('id', $id)
        ->update([
            'name' => $request->input('name'),
            'status' => $request->input('status')
        ]);

        if ($affected) {
            $response = [
                'status' => true,
                'notification' => 'Skills updated successfully!',
            ];
        } else {
            $response = [
                'status' => false,
                'notification' => 'Nothing to update in Skills.',
            ];
        }

        return response()->json($response);
    }

    // Delete an existing Skills status
    public function delete_skills($id)
    {
        $skills = DB::table('skills')->where('id', $id);
        if (!$skills) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $skills->delete();

        $response = [
            'status' => true,
            'notification' => 'Skills Deleted successfully!',
        ];

        return response()->json($response);
    }


    // years_of_exp
    public function index_years_of_exp()
    {
        $years_of_exp = DB::table('years_of_exp')->get();
        return view('backend.pages.years_of_exp.index', compact('years_of_exp'));
    }

    // Show the form for adding a new Years Of Exp
    public function add_years_of_exp()
    {
        return view('backend.pages.years_of_exp.add');
    }
    public function create_years_of_exp(Request $request) {

             // Validate form data
             $validator = Validator::make($request->all(), [
                'year_range' => 'required|string|max:255',
                'status' => 'required|string|max:5'
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'notification' => $validator->errors()->all()
                ], 200);
            } 
    
            $years_of_exp = DB::table('years_of_exp')->insert([
                'year_range' => $request->input('year_range'),
                'status' => $request->input('status')
            ]);
        if($years_of_exp){
            $response = [
                'status' => true,
                'notification' => 'Years Of Exp added successfully!',
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

    // Show the form for editing an existing Years Of Exp
    public function edit_years_of_exp($id)
    {
        $years_of_exp = DB::table('years_of_exp')->where('id', $id)->first();
        return view('backend.pages.years_of_exp.edit', compact('years_of_exp'));
    }

    // Update an existing Years Of Exp
    public function update_years_of_exp(Request $request)
    {

           // Validate form data
        $validator = Validator::make($request->all(), [
            'year_range' => 'required',
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
        $affected = DB::table('years_of_exp')
        ->where('id', $id)
        ->update([
            'year_range' => $request->input('year_range'),
            'status' => $request->input('status')
        ]);

        if ($affected) {
            $response = [
                'status' => true,
                'notification' => 'Years Of Exp updated successfully!',
            ];
        } else {
            $response = [
                'status' => false,
                'notification' => 'Nothing to update in Years Of Exp.',
            ];
        }

        return response()->json($response);
    }

    // Delete an existing Years Of Exp
    public function delete_years_of_exp($id)
    {
        $years_of_exp = DB::table('years_of_exp')->where('id', $id);
        if (!$years_of_exp) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $years_of_exp->delete();

        $response = [
            'status' => true,
            'notification' => 'Years Of Exp Deleted successfully!',
        ];

        return response()->json($response);
    }
}
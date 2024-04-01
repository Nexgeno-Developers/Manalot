<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PracticeArea;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PracticeAreaController extends Controller
{
    public function index() {
        $practicearea = PracticeArea::orderBy('id', 'desc')->get();
        return view('backend.pages.practicearea.index', compact('practicearea'));
    }

    public function add() {
        $practicearea = PracticeArea::where('status', 1)->get();
        return view('backend.pages.practicearea.add', compact('practicearea'));
    }  
    
    public function create(Request $request) {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:191',
            'slug' => 'required|unique:practice_areas',
            'short_description' => 'required',
            //'thumnail_image' => 'image',
            'section_image' => 'image',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required',
            'breadcrumb_title' => 'required|max:191',
            'breadcrumb_subtitle' => 'required|max:191',
            //'breadcrumb_image' => 'required|image', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }        
    
        // Upload image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets/image/practicearea', 'public');
        } else {
            $imagePath = null;
        }

        if ($request->hasFile('breadcrumb_image')) {
            $imagePath1 = $request->file('breadcrumb_image')->store('assets/image/practicearea', 'public');
        } else {
            $imagePath1 = null;
        }

        if ($request->hasFile('section_image')) {
            $imagePath2 = $request->file('section_image')->store('assets/image/practicearea', 'public');
        } else {
            $imagePath2 = null;
        }

        // Extract and handle progress bar data
        $progress_bar = $request->input('progress_bar');
        $progress_bar_description = $request->input('progress_bar_description');
    
        if (!empty($progress_bar[0])) {
            $progress_bars = [];
            for ($j = 0; $j < count($progress_bar); $j++) {
                $progress_bars[] = [
                    $progress_bar[$j] => $progress_bar_description[$j],
                ];
            }
            $data['progress_bar'] = json_encode($progress_bars);
        } else {
            $data['progress_bar'] = '[]';
        }

        unset($data['progress_bar_description']);

        // Extract and handle compliances data
        $compliances = $request->input('compliances');
        $compliances_description = $request->input('compliances_description');
    
        if (!empty($compliances[0])) {
            $compliancess = [];
            for ($j = 0; $j < count($compliances); $j++) {
                $compliancess[] = [
                    $compliances[$j] => $compliances_description[$j],
                ];
            }
            $data['compliances'] = json_encode($compliancess);
        } else {
            $data['compliances'] = '[]';
        }

        // Remove the 'faq_description' key as it's not needed anymore
        unset($data['compliances_description']);

        // Extract and handle FAQ data
        $faq = $request->input('faq');
        $faq_description = $request->input('faq_description');
    
        if (!empty($faq[0])) {
            $faqs = [];
            for ($j = 0; $j < count($faq); $j++) {
                $faqs[] = [
                    $faq[$j] => $faq_description[$j],
                ];
            }
            $data['faq'] = json_encode($faqs);
        } else {
            $data['faq'] = '[]';
        }
    
        // Remove the 'faq_description' key as it's not needed anymore
        unset($data['faq_description']);

        $slug = Str::slug($request->input('slug'), '-');

        $focusArea = $request->input('focus_area', []);
        
        // Create the PracticeArea record with 'PracticeArea_category_ids' included
        PracticeArea::create([
            'parent_id' => $request->input('parent_id'),
            'title' => $request->input('title'),
            'slug' => $slug,
            'short_description' => $request->input('short_description'),
            'content' => $request->input('content'),
            'focus_area' => json_encode($focusArea),
            'why_choose_us' => $request->input('why_choose_us'),
            'faq' => $data['faq'],
            'thumnail_image' => $imagePath,
            'alt_thumnail_image' => $request->input('alt_thumnail_image'),
            'section_image' => $imagePath2,
            'alt_section_image' => $request->input('alt_section_image'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'breadcrumb_title' => $request->input('breadcrumb_title'),
            'breadcrumb_subtitle' => $request->input('breadcrumb_subtitle'),
            'breadcrumb_image' => $imagePath1,
            'indian_price' => $request->input('indian_price'),
            'foreign_price' => $request->input('foreign_price'),
            'progress_bar_title' => $request->input('progress_bar_title'),
            'progress_bar' => $data['progress_bar'],
            'Content_title' => $request->input('Content_title'),
            'Content_list_title' => $request->input('Content_list_title'),
            'Content_list' => json_encode($request->input('Content_list')),
            'other_content' => $request->input('other_content'),
            'Section_title_el' => $request->input('Section_title_el'),
            'eligibility_title' => $request->input('eligibility_title'),
            'eligibility_sub_title' => $request->input('eligibility_sub_title'),
            'eligibility_list' => json_encode($request->input('eligibility_list')),
            'eligibility_content' => $request->input('eligibility_content'),
            'Section_title_doc' => $request->input('Section_title_doc'),
            'doc_title' => $request->input('doc_title'),
            'doc_list' => json_encode($request->input('doc_list')),
            'doc_content' => $request->input('doc_content'),
            'Section_title_pro' => $request->input('Section_title_pro'),
            'process_content' => $request->input('process_content'),
            'process_list_title' => $request->input('process_list_title'),
            'process_list' => json_encode($request->input('process_list')),
            'other_content_pro' => $request->input('other_content_pro'),
            'Section_title_comp' => $request->input('Section_title_comp'),
            'compliances_content' => $request->input('compliances_content'),
            'compliances' => $data['compliances'],
            'other_content_comp' => $request->input('other_content_comp'),
            'Section_title_asst' => $request->input('Section_title_asst'),
            'assistance_content' => $request->input('assistance_content'),

        ]);
    
        $response = [
            'status' => true,
            'notification' => 'Practice area added successfully!',
        ];
    
        return response()->json($response);
    }   

    public function edit($id) {
        $practicearea = PracticeArea::find($id);
        $allpracticearea = PracticeArea::where('status', 1)->get();
        return view('backend.pages.practicearea.edit', compact('practicearea', 'allpracticearea'));
    }
    
    public function view($id) {
        $practicearea = PracticeArea::find($id);
        return view('backend.pages.practicearea.view', compact('practicearea'));
    }  
    
    public function delete($id) {
        
        $practicearea = PracticeArea::find($id);
        $practicearea->delete();

        $response = [
            'status' => true,
            'notification' => 'Practice area deleted successfully!',
        ];

        return response()->json($response);
    }  
    
    public function status($id, $status) { 
        $practicearea = PracticeArea::find($id);
        $practicearea->status = $status;
        $practicearea->save();
    
        return redirect(route('practicearea.index'))->with('success', 'Status changed successfully!');
    }  
    
    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:191',
            'slug' => 'required|unique:practice_areas,slug,'. $request->input('id'),
            'short_description' => 'required',
            //'thumnail_image' => 'image',
            'section_image' => 'image',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required',
            'breadcrumb_title' => 'required|max:191',
            'breadcrumb_subtitle' => 'required|max:191',
            //'breadcrumb_image' => 'image', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }

        $id = $request->input('id');
        $practicearea = PracticeArea::find($id);
    
        if ($request->hasFile('image')) {
            // Update the image if a new one is uploaded
            $imagePath = $request->file('image')->store('assets/image/practicearea', 'public');
            $practicearea->thumnail_image = $imagePath;
        }else{
            if($request->has('image_check') && $practicearea->thumnail_image){
                Storage::disk('public')->delete($practicearea->thumnail_image);
                $practicearea->thumnail_image = null;
            }
        }

        if ($request->hasFile('breadcrumb_image')) {
            // Update the image if a new one is uploaded
            $imagePath1 = $request->file('breadcrumb_image')->store('assets/image/practicearea', 'public');
            $practicearea->breadcrumb_image = $imagePath1;
        }else{
            if($request->has('breadcrumb_image_check') && $practicearea->breadcrumb_image){
                Storage::disk('public')->delete($practicearea->breadcrumb_image);
                $practicearea->breadcrumb_image = null;
            }
        }

        if ($request->hasFile('section_image')) {
            // Update the image if a new one is uploaded
            $imagePath2 = $request->file('section_image')->store('assets/image/practicearea', 'public');
            $practicearea->section_image = $imagePath2;
        }else{
            if($request->has('section_image_check') && $practicearea->section_image){
                Storage::disk('public')->delete($practicearea->section_image);
                $practicearea->section_image = null;
            }
        }

        // Extract and handle progress bar data
        $progress_bar = $request->input('progress_bar');
        $progress_bar_description = $request->input('progress_bar_description');
    
        if (!empty($progress_bar[0])) {
            $progress_bars = [];
            for ($j = 0; $j < count($progress_bar); $j++) {
                $progress_bars[] = [
                    $progress_bar[$j] => $progress_bar_description[$j],
                ];
            }
            $data['progress_bar'] = json_encode($progress_bars);
        } else {
            $data['progress_bar'] = '[]';
        }

        unset($data['progress_bar_description']);

        // Extract and handle compliances data
        $compliances = $request->input('compliances');
        $compliances_description = $request->input('compliances_description');
    
        if (!empty($compliances[0])) {
            $compliancess = [];
            for ($j = 0; $j < count($compliances); $j++) {
                $compliancess[] = [
                    $compliances[$j] => $compliances_description[$j],
                ];
            }
            $data['compliances'] = json_encode($compliancess);
        } else {
            $data['compliances'] = '[]';
        }

        // Remove the 'faq_description' key as it's not needed anymore
        unset($data['compliances_description']);

        // Extract and handle FAQ data
        $faq = $request->input('faq');
        $faq_description = $request->input('faq_description');
    
        if (!empty($faq[0])) {
            $faqs = [];
            for ($j = 0; $j < count($faq); $j++) {
                $faqs[] = [
                    $faq[$j] => $faq_description[$j],    
                ];
            }
            $data['faq'] = json_encode($faqs);
        } else {
            $data['faq'] = '[]';
        }
    
        // Remove the 'faq_description' key as it's not needed anymore
        unset($data['faq_description']);

        $slug = Str::slug($request->input('slug'), '-');
    
        $practicearea->parent_id = $request->input('parent_id');
        $practicearea->title = $request->input('title');
        $practicearea->slug = $slug;
        $practicearea->alt_thumnail_image = $request->input('alt_thumnail_image');
        $practicearea->alt_section_image = $request->input('alt_section_image');
        $practicearea->short_description = $request->input('short_description');
        $practicearea->content = $request->input('content');
        $practicearea->focus_area = json_encode($request->input('focus_area'));
        $practicearea->why_choose_us = $request->input('why_choose_us');
        $practicearea->faq = $data['faq'];
        $practicearea->meta_title = $request->input('meta_title');
        $practicearea->meta_description = $request->input('meta_description');
        $practicearea->breadcrumb_title = $request->input('breadcrumb_title');
        $practicearea->breadcrumb_subtitle = $request->input('breadcrumb_subtitle');
        
        $practicearea->indian_price = $request->input('indian_price');
        $practicearea->foreign_price = $request->input('foreign_price');
        $practicearea->progress_bar_title = $request->input('progress_bar_title');
        $practicearea->progress_bar = $data['progress_bar'];
        $practicearea->Content_title = $request->input('Content_title');
        $practicearea->Content_list_title = $request->input('Content_list_title');
        $practicearea->Content_list = json_encode($request->input('Content_list'));
        $practicearea->other_content = $request->input('other_content');
        $practicearea->Section_title_el = $request->input('Section_title_el');
        $practicearea->eligibility_title = $request->input('eligibility_title');
        $practicearea->eligibility_sub_title = $request->input('eligibility_sub_title');
        $practicearea->eligibility_list = json_encode($request->input('eligibility_list'));
        $practicearea->eligibility_content = $request->input('eligibility_content');
        $practicearea->Section_title_doc = $request->input('Section_title_doc');
        $practicearea->doc_title = $request->input('doc_title');
        $practicearea->doc_list = json_encode($request->input('doc_list'));
        $practicearea->doc_content = $request->input('doc_content');
        $practicearea->Section_title_pro = $request->input('Section_title_pro');
        $practicearea->process_content = $request->input('process_content');
        $practicearea->process_list_title = $request->input('process_list_title');
        $practicearea->process_list = json_encode($request->input('process_list'));
        $practicearea->other_content_pro = $request->input('other_content_pro');
        $practicearea->Section_title_comp = $request->input('Section_title_comp');
        $practicearea->compliances_content = $request->input('compliances_content');
        $practicearea->compliances = $data['compliances'];
        $practicearea->other_content_comp = $request->input('other_content_comp');
        $practicearea->Section_title_asst = $request->input('Section_title_asst');
        $practicearea->assistance_content = $request->input('assistance_content');
    
        $practicearea->save();

        $response = [
            'status' => true,
            'notification' => 'Practice area updated successfully!',
        ];

        return response()->json($response);
    }   
}

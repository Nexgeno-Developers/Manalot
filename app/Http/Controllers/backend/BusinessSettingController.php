<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessSetting;
use Illuminate\Support\Facades\Validator;

class BusinessSettingController extends Controller
{
    public function index() {
        return view('backend.pages.setting.index');
    }

    public function privacy_policy() {
        return view('backend.pages.privacy.index');
    }

    public function terms() {
        return view('backend.pages.terms.index');
    }

    public function refund_policy() {
        return view('backend.pages.refund_policy.index');
    }
      
    public function update(Request $request) {
        // Assuming the request data is in key-value pairs
    
        // Get all the data from the request
        $requestData = $request->all();
        /*
        foreach ($requestData as $key => $value) {
            if($key != '_token'){
                BusinessSetting::where('type', $key)->update(['value' => $value]);
            }
        } */

        foreach ($requestData as $key => $value) {
            if ($key !== '_token' && $value !== null) {
                if ($key === 'Banner_1' || $key === 'Banner_2' || $key === 'Banner_3' || $key === 'Banner_4') {
                    // Handle image update here
                    $type = $key;
                    
                    $imagePath = $value->store('assets/image/banner', 'public');
                    BusinessSetting::where('type', $type)->update(['value' => $imagePath]);
                } else {
                    BusinessSetting::where('type', $key)->update(['value' => $value]);
                }
            }
        }

        $response = [
            'status' => true,
            'notification' => 'Blog updated successfully!',
        ];

        return response()->json($response);
    }
}

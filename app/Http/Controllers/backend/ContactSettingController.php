<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactSetting;
use Illuminate\Support\Facades\Validator;

class ContactSettingController extends Controller
{
    public function index() {
        return view('backend.pages.contact_page_setting.index');
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

                if ($key === 'step_bar' || $key === 'step_bar_description' || $key === 'icon') {
                    // Handle image update here
                    $type = 'steps';


                    $step_bar = $request->input('step_bar');
                    $step_bar_description = $request->input('step_bar_description');

                    
                
                    if (!empty($step_bar[0])) {
                        $step_bars = [];
                        for ($j = 0; $j < count($step_bar); $j++) {
                            $step_bars[] = [
                                $step_bar[$j] => $step_bar_description[$j],
                            ];
                            
                        }
                        $data['step_bar'] = json_encode($step_bars);
                    } else {
                        $data['step_bar'] = '[]';
                    }
            
                    unset($data['step_bar_description']);

                    //$imagePath = $value->store('assets/image/banner', 'public');
                    ContactSetting::where('type', $type)->update(['value' => $data['step_bar']]);
                } else {
                    ContactSetting::where('type', $key)->update(['value' => $value]);
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

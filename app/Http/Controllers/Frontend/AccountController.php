<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\User;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Common\AadharController;

use App\Http\Controllers\Common\EsignAadharController;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

use Auth;

class AccountController extends Controller
{
    public function registration_page(){
        return view('frontend.pages.registration.index');
    }

    public function create_account($param, Request $request){

        if($param == "user-info"){

            $rsp_msg = $this->create_user_detail($request);

        }elseif($param == "verify-otp"){

            $rsp_msg = $this->verify_otp($request);
        
        }elseif($param == "resend-otp"){

            $rsp_msg = $this->resendOtp($request);

        }elseif($param == "customer-info"){

            $rsp_msg = $this->create_customer_detail($request);

        }elseif($param == "plan-info"){

            $rsp_msg = $this->update_plan_detail($request);

        }elseif($param == "ekyc-varification"){

            $rsp_msg = $this->accept_ekyc_term($request);

        }elseif($param == "aadhar-verify-request-otp"){

            $rsp_msg = $this->aadhar_verify_request_otp($request);

        }elseif($param == "aadhar-otp-verify"){

            $rsp_msg = $this->aadhar_otp_verify($request);

        }elseif($param == "esign-varification"){

            $rsp_msg = $this->accept_esign_term($request);

        }elseif($param == "esign-aadhar-verify-request-otp"){

            $rsp_msg = $this->esign_aadhar_verify_request_otp($request);

        }elseif($param == "esign-verify"){
            
            $rsp_msg = $this->esign_verify();

            if($rsp_msg = "true"){
                Session::put('step', 12);
            } else {
                Session::put('step', 10);
            }

            return redirect()->route('account.new.enrollment.page');

        }elseif($param == "payment-gateway"){

            $rsp_msg = $this->payment_gateway($request);

        } else {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message'] = "Invalid parameter: $param";
        }
        

        return response()->json(array('response_message' => $rsp_msg));
    }

    public function create_user_detail($request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',

            'street' => 'required|string|regex:/^[A-Za-z0-9\s,.\'\/&]+$/|min:3',
            'locality' => 'required|string|regex:/^[A-Za-z0-9\s,.\'\/&]+$/|min:3',
            'state' => 'required|string|regex:/^[A-Za-z\s,.\'\/&]+$/|min:3',
            'city' => 'required|string|regex:/^[A-Za-z\s,.\'\/&]+$/|min:3',
            'pincode' => 'required|regex:/^[\d\s-]+$/|min:6',
            'pan_number' => 'required|string|regex:/^[A-Za-z0-9\s,.\'\/&]+$/|min:10|max:10',
            'dob' => 'required',
        ]);

        if ($validator->fails()) {
            $rsp_msg['response'] = 'error';
            $rsp_msg['message']  = $validator->errors()->all();

            return $rsp_msg;
        }

    }


}
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;


class IndexController extends Controller
{
    public function index(){
        return view('frontend.pages.home.index');
    }

//--------------=============================== other ================================------------------------------

    public function not_found(){

        return view('frontend.pages.404.index');
    }
    public function thank_you(){

        return view('frontend.pages.thankyou.index');
    }

    // public function cookie_policy(){

    //     return view('frontend.pages.cookiePolicy.index');
    // }

    public function about_us(){

        return view('frontend.pages.about_us.index');
    }

    public function help_center(){

        return view('frontend.pages.help_center.index');
    }

//--------------=============================== other ================================------------------------------

//--------------=============================== Pages ================================------------------------------

    public function contact_us(){
        return view('frontend.pages.contact.index');
    }

    public function privacy_policy(){
        return view('frontend.pages.privacypolice.index');
    }

//--------------=============================== Pages ================================------------------------------

//--------------=============================== contact form save ===========================------------------------------

    public function contact_save(Request $request)
    {
        $rules = [
            'cv' => 'nullable|mimetypes:application/pdf,application/msword',
            //'g-recaptcha-response' => 'required|captcha',
        ];
    
        $validator = \Validator::make($request->all(), $rules); // Pass $request->all() as the first argument
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors(),
            ]);
        }
    
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('assets/image/pdf', 'public');
        } else {
            $cvPath = null; // Set to null if 'cv' is not provided
        }
    
        // Create the contact record, including 'cv' if provided
        $contactData = $request->all();
        $contactData['cv'] = $cvPath;

        $name = isset($contactData["name"]) ? $contactData["name"] : ' - ';
        $email = isset($contactData["email"]) ? $contactData["email"] : ' - ';
        $phone = isset($contactData["phone"]) ? $contactData["phone"] : ' - ';
        $services = isset($contactData["services"]) ? $contactData["services"] : ' - ';
        $description = isset($contactData["description"]) ? $contactData["description"] : ' - ';
        //$ip = isset($contactData["ip"]) ? $contactData["ip"] : ' - ';
        $section = isset($contactData["section"]) ? $contactData["section"] : ' - ';
        $ref_url = isset($contactData["ref_url"]) ? $contactData["ref_url"] : ' - ';
        $url = isset($contactData["url"]) ? $contactData["url"] : ' - ';
        $qualification = isset($contactData["qualification"]) ? $contactData["qualification"] : ' - ';

        // Create the contact record
        Contact::create($contactData);

        // Send email if $cvPath is not null

        $recipient = 'admin@seedlingassociates.com'; // Replace with the actual recipient email
        $subject = 'Lead Enquiry';

        $body = '<table>';
        $body .= "<tr><td style='width: 150px;'><strong>From :</strong></td><td>" . $name . ' ' . $email . "</td></tr></br>";
        $body .= "<tr><td style='width: 150px;'><strong>Form Name :</strong></td><td>" . $section . "</td></tr></br>";
        $body .= "<tr><td style='width: 150px;'><strong>Page URL :</strong></td><td>" . $url . "</td></tr></br><p></p>";
        
        $body .= "<tr><td style='width: 150px;'><strong>Full Name :</strong></td><td>" . $name . "</td></tr></br>";
        $body .= "<tr><td style='width: 150px;'><strong>Email Address :</strong></td><td>" . $email . "</td></tr></br>";
        $body .= "<tr><td style='width: 150px;'><strong>Phone Number :</strong></td><td>" . $phone . "</td></tr></br>";

        if (isset($contactData["description"]) || isset($contactData["services"])) {
            $body .= "<tr><td style='width: 150px;'><strong>Service Requested :</strong></td><td>" . ($services ?? 'Not provided') . "</td></tr></br>";
            $body .= "<tr><td style='width: 150px;'><strong>Description :</strong></td><td>" . ($description ?? 'Not provided') . "</td></tr></br><p></p>";
        } else {
            $body .= "<tr><td style='width: 150px;'><strong>Description :</strong></td><td>" . ($description ?? 'Not provided') . "</td></tr></br><p></p>";
        }
        
        /*
        $body .= "<tr><td style='width: 150px;'><strong>Ip :</strong></td><td>" . $ip . "</td></tr></br>";
        $body .= "<tr><td style='width: 150px;'><strong>User Location :</strong></td><td>" . 
                    ($user_data['city'] ?? 'null') . ' ' . 
                    ($user_data['region'] ?? 'null') . ' ' . 
                    ($user_data['country'] ?? 'null') . 
                "</td></tr></br>";
        */
        $body .= "<tr><td style='width: 150px;'><strong>Referrer URL :</strong></td><td>" . $ref_url . "</td></tr></br>";

        $body .= "<tr><td style='width: 150px;'><strong>Submitted Data :</strong></td><td>" . date('Y-m-d') . "</td></tr></br>";
        $body .= '</table>';

        if ($cvPath !== null) {
             // Optional attachments
            $attachments = [
                [
                    'path' => storage_path("app/public/$cvPath"), // Replace with the actual path
                    'name' => ''.$name.'.pdf', // Replace with the desired attachment name
                ],
                // Add more attachments if needed
            ];

            // Send the email
            sendEmail($recipient, $subject, $body, $attachments);

        } else {
            sendEmail($recipient, $subject, $body);
        }

    
        $response = [
            'status' => true,
            'notification' => 'Contact added successfully!',
        ];
    
        return response()->json($response);
    }
   //--------------=============================== contact form save ===========================--------------------------
   
//--------------=============================== other feature ====================================---------------------

    // public function search(Request $request){

    //     $query = $request->input('query');

    //     $blogs = Blog::where(function ($queryBuilder) use ($query) {
    //         $queryBuilder->where('title', 'like', "%$query%")
    //             ->orWhere('short_description', 'like', "%$query%")
    //             ->orWhere('content', 'like', "%$query%");
    //     })->where('status', 1)->get();
        
    //     $practiceAreas = PracticeArea::where(function ($queryBuilder) use ($query) {
    //         $queryBuilder->where('title', 'like', "%$query%")
    //             ->orWhere('short_description', 'like', "%$query%")
    //             ->orWhere('content', 'like', "%$query%");
    //     })->where('status', 1)->get();

    //     return view('frontend.pages.search.index', compact('blogs','practiceAreas'));
    // }

    // public function comment_save(Request $request)
    // {
    //     $commentData = $request->all();
    
    //     // Create the contact record
    //     BlogComment::create($commentData);
    
    //     $response = [
    //         'status' => true,
    //         'notification' => 'Comment added successfully!',
    //     ];
    
    //     return response()->json($response);
    // }

// =====================--------------- Privacy Policy -------------====================

    public function terms_page(){
        return view('frontend.pages.terms.index');
    }

     public function sample_profile(){
        return view('frontend.pages.sample_profile.index');
    }


    public function refund_policy(){
        return view('frontend.pages.refund_policy.index');
    }

// =====================--------------- Privacy Policy -------------====================

// =====================--------------- dummy controller -------------====================

    public function edit_profile(){
        return view('frontend.pages.registration.edit_profile');
    }

    // public function admin(){
    //     return view('frontend.pages.registration.admin');
    // }

    public function testing_code(){
        return get_access_token_od();
    }
    

    // =====================--------------- dummy controller -------------====================


}
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PracticeArea;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use App\Models\Team;
use App\Models\Faq;
use App\Models\Contact;
use App\Models\BlogComment;
use App\Models\MediaCoverage;
use App\Models\Publication;
use Illuminate\Support\Facades\Mail;


class IndexController extends Controller
{
    public function index(){
        return view('frontend.pages.home.index');
    }
//--------------=============================== practice area =====================---------------------------
    public function practice_area(){
        $practiceAreas = PracticeArea::where('status', 1)->orderBy('updated_at', 'desc')->get();

        //return $practiceAreas;
        return view('frontend.pages.practicearea.index', compact('practiceAreas'));
    }

    public function practice_area_detail($slug){
        $detail = PracticeArea::where('slug', $slug)->where('status', 1)->first();

        $nav_practice = PracticeArea::where('status', 1)->where('parent_id', $detail->parent_id)->where('id', '!=', $detail->id)->limit(2)->get(['title', 'slug', 'status']);

        //$slug = str_replace('-', ' ', $slug);
        /*
        $blog_Catg = BlogCategory::where('slug', $slug)->where('status', 1)->first();

        if(!empty($blog_Catg)){
            $blog = Blog::where('status', 1)->whereJsonContains('blog_category_ids', ''.$blog_Catg->id.'')->limit(3)->orderBy('id', 'desc')->get();
        } else {
            $blog = [];
        }
        */
        
        /*
        if(empty($detail->parent_id)){  
            $focusAreaIds = json_decode($detail->focus_area, true);
            $focusAreaIds = is_array($focusAreaIds) ? $focusAreaIds : [];

            $child_detail = PracticeArea::where('status', 1)->whereIn('id', $focusAreaIds)->get();
        } else  {
            $child_detail = [];
        }
        */



        //return view('frontend.pages.practicearea.detail', compact('detail', 'child_detail', 'blog'));
        return view('frontend.pages.practicearea.detail', compact('detail','nav_practice'));
    }
//--------------=============================== practice area end =====================------------------------------

//--------------=============================== Blog  ================================------------------------------

    public function blog(){
        $blog = Blog::where('status', 1)->whereJsonContains('blog_category_ids', '3')->orderBy('updated_at', 'desc')->paginate(6);

        return view('frontend.pages.blog.index', compact('blog'));
    }

    public function blog_data(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = 6;
    
        $blog = Blog::where('status', 1)
            ->whereJsonContains('blog_category_ids', '3')
            ->orderBy('updated_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page);
    
        if ($request->ajax()) {
            $view = view('frontend.component.blog_list_card', compact('blog'))->render();
    
            return response()->json(['html' => $view]);
        }
    
        return view('frontend.pages.blog.index', compact('blog'));
    }

    public function blog_detail($category, $slug){

        $category_id = BlogCategory::where('slug',$category)->first();

        $detail = Blog::where('slug', $slug)->where('status', 1)->first();

        //$author = json_decode($detail->user_id, true);
        $author = $detail->user_id;

        $blog = Blog::where('status', 1)->whereJsonContains('blog_category_ids', json_decode($detail->blog_category_ids)['0'])->where('id', '!=', $detail->id)->limit(3)->orderBy('id', 'desc')->get();

        $current_id = $detail->id;

        $previous = Blog::where('status', 1)->whereJsonContains('blog_category_ids', ''.$category_id->id.'')->where('id', '<', $current_id)->orderBy('id', 'desc')->first();
        $next = Blog::where('status', 1)->whereJsonContains('blog_category_ids', ''.$category_id->id.'')->where('id', '>', $current_id)->orderBy('id', 'asc')->first();

        $previous_slug = $previous ? $previous->slug : null;
        $next_slug = $next ? $next->slug : null;

        return view('frontend.pages.blog.detail', compact('detail','author','blog','previous_slug','next_slug'));
    }

//--------------=============================== Blog end ================================------------------------------

//--------------=============================== Team  ================================------------------------------

    public function team_members(){
        $team = Team::orderBy('series', 'asc')->get();

        return view('frontend.pages.team.index', compact('team'));
    }

    public function team_detail($slug){
        $slug = str_replace('-', ' ', $slug);

        $detail = Team::where('name', $slug)->where('status', 1)->first();

        return view('frontend.pages.team.detail', compact('detail'));
    }

//--------------=============================== Team end ================================------------------------------

//--------------=============================== other ================================------------------------------

    public function not_found(){

        return view('frontend.pages.404.index');
    }
    public function thank_you(){

        return view('frontend.pages.thankyou.index');
    }

    public function cookie_policy(){

        return view('frontend.pages.cookiePolicy.index');
    }

//--------------=============================== other ================================------------------------------

//--------------=============================== Pages ================================------------------------------

    public function contact_us(){
        return view('frontend.pages.contact.index');
    }
    public function information(){
        return view('frontend.pages.information.index');
    }

    public function opennew_account(){
        return view('frontend.pages.opennewaccount.index');
    }

    public function faq(){
        $faq = Faq::where('status', 1)->get();
        return view('frontend.pages.faq.index', compact('faq'));
    }

    public function instantpay(){
        return view('frontend.pages.instantpay.index');
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
   
   //--------------=============================== news ==========================================-------------------------

    public function news(){
        $news = Blog::where('status', 1)->whereJsonContains('blog_category_ids', '4')->orderBy('created_at', 'desc')->paginate(6);

        return view('frontend.pages.news.index', compact('news'));
    }

    public function news_data(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = 6;
    
        $news = Blog::where('status', 1)->whereJsonContains('blog_category_ids', '4')->orderBy('created_at', 'desc')->paginate($perPage, ['*'], 'page', $page);
    
        if ($request->ajax()) {
            $view = view('frontend.component.news_card', compact('news'))->render();
    
            return response()->json(['html' => $view]);
        }
    
        return view('frontend.pages.news.index', compact('news'));
    }

    //--------------=============================== news end ==========================================---------------------

     //--------------=============================== Deal Update ====================================---------------------

    public function deal_update(){
        $deal_update = Blog::where('status', 1)->whereJsonContains('blog_category_ids', '5')->orderBy('created_at', 'desc')->paginate(6);

        return view('frontend.pages.deal_update.index', compact('deal_update'));
    }

    public function deal_update_data(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = 6;
    
        $deal_update = Blog::where('status', 1)->whereJsonContains('blog_category_ids', '5')->orderBy('created_at', 'desc')->paginate($perPage, ['*'], 'page', $page);
    
        if ($request->ajax()) {
            $view = view('frontend.component.deal_update_card', compact('deal_update'))->render();
    
            return response()->json(['html' => $view]);
        }
    
        return view('frontend.pages.deal_update.index', compact('deal_update'));
    }

//--------------=============================== Deal Update end =================================---------------------

//--------------=============================== media coverage ====================================---------------------

    public function media_coverage(){
        $media_coverage = MediaCoverage::where('status', 1)->orderBy('created_at', 'desc')->paginate(6);

        return view('frontend.pages.media_coverage.index', compact('media_coverage'));
    }

    public function media_coverage_data(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = 6;
    
        $media_coverage = MediaCoverage::where('status', 1)->orderBy('created_at', 'desc')->paginate($perPage, ['*'], 'page', $page);
    
        if ($request->ajax()) {
            $view = view('frontend.component.media_coverage_card', compact('media_coverage'))->render();
    
            return response()->json(['html' => $view]);
        }
    
        return view('frontend.pages.media_coverage.index', compact('media_coverage'));
    }

  //--------------=============================== media coverage ====================================---------------------

  //--------------=============================== publication ====================================---------------------

    public function publication(){
        $publication = Publication::where('status', 1)->orderBy('created_at', 'desc')->paginate(6);

        return view('frontend.pages.publication.index', compact('publication'));
    }

    public function publication_data(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = 6;
    
        $publication = Publication::where('status', 1)->orderBy('created_at', 'desc')->paginate($perPage, ['*'], 'page', $page);
    
        if ($request->ajax()) {
            $view = view('frontend.component.publication_card', compact('publication'))->render();
    
            return response()->json(['html' => $view]);
        }
    
        return view('frontend.pages.publication.index', compact('publication'));
    }

//--------------=============================== publication end ====================================---------------------

//--------------=============================== other feature ====================================---------------------

    public function search(Request $request){

        $query = $request->input('query');

        $blogs = Blog::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('title', 'like', "%$query%")
                ->orWhere('short_description', 'like', "%$query%")
                ->orWhere('content', 'like', "%$query%");
        })->where('status', 1)->get();
        
        $practiceAreas = PracticeArea::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('title', 'like', "%$query%")
                ->orWhere('short_description', 'like', "%$query%")
                ->orWhere('content', 'like', "%$query%");
        })->where('status', 1)->get();

        return view('frontend.pages.search.index', compact('blogs','practiceAreas'));
    }

    public function comment_save(Request $request)
    {
        $commentData = $request->all();
    
        // Create the contact record
        BlogComment::create($commentData);
    
        $response = [
            'status' => true,
            'notification' => 'Comment added successfully!',
        ];
    
        return response()->json($response);
    }

// =====================--------------- Privacy Policy -------------====================

    public function terms_page(){
        return view('frontend.pages.terms.index');
    }

    public function refund_policy(){
        return view('frontend.pages.refund_policy.index');
    }



}
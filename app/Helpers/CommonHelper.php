<?php

use Illuminate\Support\Facades\Cache;
use App\Models\BusinessSetting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

    if (!function_exists('datetimeFormatter')) {
        function datetimeFormatter($value)
        {
            return date('d M Y H:iA', strtotime($value));
        }
    }

    //sensSMS function for OTP
    if (!function_exists('get_settings')) {
        function get_settings($type)
        {
            $cacheKey = "business_setting_{$type}";
        
            // Check if the value is already in the cache
            if (Cache::has($cacheKey)) {
                return Cache::get($cacheKey);
            }
        
            // If not in the cache, retrieve the value from the database
            $businessSetting = BusinessSetting::where('type', $type)->first();
        
            if ($businessSetting) {
                $value = $businessSetting->value;
        
                // Store the value in the cache with a specific lifetime (e.g., 60 minutes)
                Cache::put($cacheKey, $value, now()->addMinutes(60));
        
                return $value;
            }
        
            // Handle the case where no record is found
            return null; // or any default value or error handling you prefer
        }
    }

    if (!function_exists('get_contactpage')) {
        function get_contactpage($type)
        {
            $cacheKey = "contact_page_setting_{$type}";
        
            // Check if the value is already in the cache
            if (Cache::has($cacheKey)) {
                return Cache::get($cacheKey);
            }
        
            // If not in the cache, retrieve the value from the database
            $ContactSetting = ContactSetting::where('type', $type)->first();
        
            if ($ContactSetting) {
                $value = $ContactSetting->value;
        
                // Store the value in the cache with a specific lifetime (e.g., 60 minutes)
                Cache::put($cacheKey, $value, now()->addMinutes(60));
        
                return $value;
            }
        
            // Handle the case where no record is found
            return null; // or any default value or error handling you prefer
        }
    }

    if(!function_exists('sendEmail')){
        function sendEmail($to, $subject, $body, $attachments = [])
        {
            return \Illuminate\Support\Facades\Mail::raw($body, function ($message) use ($to, $subject, $attachments) {
                $message->to($to)
                //$message->to('khanfaisal.makent@gmail.com')
                        ->subject($subject);
        
                // Attachments
                foreach ($attachments as $attachment) {
                    $message->attach($attachment['path'], ['as' => $attachment['name']]);
                }
            });
        }  
    }

    if(!function_exists('ip_info')){
        function ip_info(){
            
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'] ?  $_SERVER['REMOTE_ADDR'] : '';
            }
            $ip = explode(',', $ip);
            $ip = $ip[0];
            //$ip = '103.175.61.38111';
            		
            //$info = file_get_contents("http://ipinfo.io/{$ip}/geo");
            
            $curl = curl_init();
            
            curl_setopt($curl, CURLOPT_URL, 'ipinfo.io/'.$ip.'?token='.env('IPINFO_API_TOKEN'));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_ENCODING, '');
            curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
            curl_setopt($curl, CURLOPT_TIMEOUT, 0);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            
            $info = curl_exec($curl);
            curl_close($curl);
            
            if(!empty($info)){
                return $info; //return in json
            }else{
                $info = '{ "ip": "none", "city": "none", "region": "none", "country": "none", "loc": "none", "postal": "none", "timezone": "none", "readme": "none" }';
                return $info; //return in json
            }
        }
    }


    if (!function_exists('get_access_token_od')) {
        function get_access_token_od()
        {

            $cacheKey = "get_token_onedrive";
        
            // Check if the value is already in the cache
            if (Cache::has($cacheKey)) {
                return Cache::get($cacheKey);
            }
        
            $response = Http::asForm()->withHeaders([
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Cookie' => 'fpc=Asd-JK-swIJNtxld0wW0ljT4as7VAQAAAF6US94OAAAA; stsservicecookie=estsfd; x-ms-gateway-slice=estsfd',
            ])->post('https://login.microsoftonline.com/'.env('TENANT_ID').'/oauth2/v2.0/token', [
                'client_id' => env('MICROSOFT_CLIENT_ID'),
                'scope' => 'https://graph.microsoft.com/.default',
                'client_secret' => env('MICROSOFT_CLIENT_SECRET'),
                'grant_type' => 'client_credentials',
            ]);
            
            // Handle the response
            if ($response->successful()) {
                
                $data = $response->json('access_token');

                Cache::put($cacheKey, $data, now()->addMinutes(40));

                return $data;

            } else {

                $error = $response->body();
                return $error;
            }
            
            return null;
        }
    }



    if (!function_exists('file_upload_od')) {
        function file_upload_od($file_name, $path)
        {

            // Retrieve the access token from your method or configuration
            $accessToken = get_access_token_od();

            // Get the full path to the file
            $fullPath = storage_path('app/public/' . $path);

            // Check if file exists
            if (!file_exists($fullPath)) {
                return response()->json(['error' => 'File does not exist at ' . $fullPath], 404);
            }

            // Get the file contents
            $fileContents = $fullPath;

            // Build the request URL
            $url = 'https://graph.microsoft.com/v1.0/users/' . env('MICROSOFT_USER_ID') . '/drive/root:/Global Portal/' . $file_name . ':/content';

            // Make the HTTP request using Laravel's HTTP client
            $response = Http::withToken($accessToken)
                ->withHeaders([
                    'Content-Type' => 'application/octet-stream',
                ])
                ->put($url, $fileContents);

            // Check for errors and handle the response
            if ($response->failed()) {
                return "error on uploding";
            }
            
            // Return the decoded response
            return $response->json('webUrl');
        }
    }


<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $notApprovedCount = User::Where('approval', 0)->where('role_id', 2)->where('completed_status', 1)->count();
        $approvedCount = User::Where('approval', 1)->where('role_id', 2)->where('status', 1)->where('completed_status', 1)->count();
        $contactCount = Contact::count();
        
        return view('backend.pages.dashboard.index', compact('notApprovedCount', 'approvedCount', 'contactCount'));
    }
    
    
}

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
        $notApprovedCount = User::whereNull('approval')->orWhere('approval', 0)->orWhere('approval', '')->count();
        $approvedCount = User::whereNotNull('approval')
            ->where('approval', '<>', 0)
            ->where('approval', '<>', ' ')
            ->where('status', 1)
            ->count();
        $contactCount = Contact::count();
        
        return view('backend.pages.dashboard.index', compact('notApprovedCount', 'approvedCount', 'contactCount'));
    }
    
    
}

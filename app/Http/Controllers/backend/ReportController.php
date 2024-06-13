<?php
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Start query
        $query = DB::table('logs as QC')
            ->join('users as QP', 'QC.user_id', '=', 'QP.id')
            ->select('QC.*', 'QP.username');
            
        // Apply filters if present
        if ($request->filled('user_name')) {
            $query->where('QP.username', 'LIKE', '%' . $request->user_name . '%');
        }

        /* 
            if ($request->filled('status')) {
                $query->where('QP.status', $request->status);
            }

            if ($request->filled('approval_status')) {
                $query->where('QP.approval', $request->approval_status);
            }
        */

        $logs = $query->paginate(2);

        return view('backend.pages.report.index', compact('logs'));
    }
}

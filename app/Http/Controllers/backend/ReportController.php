<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Laravel\Prompts\Table;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('users as QP')
            ->join('logs as QC', 'QC.user_id', '=', 'QP.id')
            ->select('QC.*', 'QP.username');

        if ($request->has('status')) {
            $query->where('QP.status', $request->status);
        }

        if ($request->has('approval_status')) {
            $query->where('QP.approval', $request->approval_status);
        }

        $logs = $query->paginate(10);

        return view('backend.pages.report.index', compact('logs'));
    }
}

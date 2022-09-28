<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;
use Pdf;

class FeeReportController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isGuardian']);
    }

    public function index($id){
        $fees_report = Fee::findOrFail($id);

        return view('fees_reports.index', compact('fees_report'));
    }

    public function generatepdf($id){
        $fees_report = Fee::findOrFail($id);
        
        $pdf = PDF::loadView('fees_reports.index', compact('fees_report'))->setPaper('a4','landscape');

        return $pdf->download('fee.pdf');
    }
}

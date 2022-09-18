<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use PDF;

class ResultReportController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isGuardian']);
    }

    public function index($id){
        $results_report = Result::findOrFail($id);

        return view('results_reports.index', compact('results_report'));
    }

    public function generatepdf($id){
        $results_report = Result::findOrFail($id);
        
        $pdf = PDF::loadView('results_reports.index', compact('results_report'));

        return $pdf->download('result.pdf');
    }
}

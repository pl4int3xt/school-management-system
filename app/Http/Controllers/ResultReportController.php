<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Subject;
use Illuminate\Http\Request;
use PDF;

class ResultReportController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isGuardian']);
    }

    public function index($id){
        $subjects = Subject::All();
        $results_report = Result::findOrFail($id);

        return view('results_reports.index', compact('results_report','subjects'));
    }

    public function generatepdf($id){
        $subjects = Subject::All();
        $results_report = Result::findOrFail($id);
        
        $pdf = PDF::loadView('results_reports.index', compact('results_report','subjects'));

        return $pdf->download('result.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultReportController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isGuardian']);
    }

    public function index($id){
        $results_report = Result::findOrFail($id);

        return view('results_reports.index', compact('results_report'));
    }
}

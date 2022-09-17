<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Result;
use Illuminate\Http\Request;

class GuardianResultController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isGuardian']);
    }

    public function index(){
        $results = Result::Paginate(5);
        $students = Student::All();

        return view('guardians_results.index', compact('results','students'));
    }    
}

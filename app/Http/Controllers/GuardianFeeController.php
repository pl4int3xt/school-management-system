<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Fee;
use Illfeee\Http\Request;

class GuardianFeeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isGuardian']);
    }

    public function index(){
        $fees = Fee::Paginate(5);
        $students = Student::All();

        return view('guardians_fees.index', compact('fees','students'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;

class GuardianAttendanceController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isGuardian']);
    }

    public function index(){
        $attendances = Attendance::All();
        $students = Student::All();

        return view('guardians_attendances.index', compact('attendances','students'));
    } 
}

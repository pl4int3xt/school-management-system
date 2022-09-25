<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use DB;

class AttendanceController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isTeacher']);
    }

    public function index(){
        $teachers = Teacher::All();
        $students = Student::All();

        return view('attendances.index', compact('teachers','students'));
    }

    public function store(Request $request){
        $attendance = new Attendance();

        request()->validate([
            'name'=>'required',
            'attendance'=>'required',
            'class'=>'required',
            'date'=>'required',
        ]);
        

        $id = $request->id;
        $name = $request->name;
        $attendance = $request->attendance;
        $class = $request->class;
        $date = $request->date;
   
        for($i=0; $i<count($id);$i++){

            $data = [
                'name'=>$name[$i],
                'attendance'=>$attendance[$i],
                'class'=>$class[$i],
                'date'=>$date[$i]
            ];

            DB::table('attendances')->insert($data);
        }

        return redirect('/attendances_index')->with('mssg','attendance submitted successfully');
    }
}

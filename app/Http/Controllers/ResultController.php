<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Result;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isTeacher']);
    }

    public function index(){
        $teachers = Teacher::All();
        $students = Student::paginate(20);

        return view('results.index', compact('students','teachers'));
    }

    public function store(){
        $result = new Result();

        request()->validate([
            'name'=>'required',
            'class'=>'required',
            'term_period'=>'required',
        ]);

        $result->name = request('name');
        $result->class = request('class');
        $result->results = request('results');
        $result->term_period = request('term_period');;
        

        $result->save();

        return redirect('/results_index')->with('mssg','result created successfully');
    }

    public function edit($id){
        $student = Student::findOrFail($id);
        $subjects = Subject::All();

        return view('results.edit', compact('subjects','student'));
    }

    public function search(){
        $teachers = Teacher::All();
        $students = Student::paginate(20);
        $search = request('search');

        if($search){
            $students = Student::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $students = Student::paginate(20);
        }

        return view('results.index', compact('students','teachers'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use App\Models\Subject;
use App\Models\Result;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;
use DB;

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

    public function store(Request $request){
        $result = new Result();
        $subjects = DB::table('subjects')->get();

        request()->validate([
            'name'=>'required',
            'class'=>'required',
            'total_subjects'=>'required',
            'total'=>'required',
            'average'=>'required',
            'grade'=>'required',
            'term_period'=>'required',
        ]);

        // $all_subjects = [];
        // $all_results = [];

        // $result = $request->results;

        // foreach($subjects as $subject){
        //     //$res = [$subject => $result[$i]];
        //     array_push($all_subjects, $subject->name);
        // }

        // for($i = 0; $i < count($subjects);$i++){
        //     //array_push($ress);
        //     //$res = array($subject->name => $result[$i]);
        //     array_push($all_results, $result[$i]);
        // }

        // $results = array_combine($all_subjects, $all_results);
        // $results = $results;

        // $res = $request->results;
        // //return dd($res);
        // //return dd($results);
        // //$results = $request->results;
        // //return dd($results);
        
        // //$results = $results;
        // $name = $request->name;
        // $class = $request->class;
        // $total_subjects = $request->total_subjects;
        // $total = $request->total;
        // $average = $request->average;
        // $grade = $request->grade;
        // $term_period = $request->term_period;


        // $data = [
        //     'name'=>$name,
        //     'results'=>$results,
        //     'class'=>$class,
        //     'total_subjects'=>$total_subjects,
        //     'total'=>$total,
        //     'average'=>$average,
        //     'grade'=>$grade,
        //     'term_period'=>$term_period,
        // ];

        // DB::table('results')->insert($data);

        $result->results = request('results');
        $result->name = request('name');
        $result->class = request('class');
        $result->total_subjects = request('total_subjects');
        $result->total = request('total');
        $result->average = request('average');
        $result->grade = request('grade');
        $result->term_period = request('term_period');
        

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

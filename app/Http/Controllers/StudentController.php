<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Dormitory;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }
    
    public function index(){
        $dormitories = Dormitory::All();
        $students = Student::Paginate(20);
        $clases = Clas::all();

        return view('students.index', compact('students','clases','dormitories'));
    }

    public function store(){
        $student = new Student();

        request()->validate([
            'name'=>'required',
            'adm_no'=>'required',
            'date_of_birth'=>'required',
            'parent'=>'required',
            'class'=>'required',
        ]);

        $student->name = request('name');
        $student->adm_no = request('adm_no');
        $student->dormitory = request('dormitory');
        $student->date_of_birth = request('date_of_birth');
        $student->parent = request('parent');
        $student->class = request('class');
        

        $student->save();

        return redirect('/students_index')->with('mssg','student created successfully');
    }

    public function update($id){
        $student = Student::findOrFail($id);

        request()->validate([
            'name'=>'required',
            'adm_no'=>'required',
            'date_of_birth'=>'required',
            'parent'=>'required',
            'class'=>'required',
        ]);
        
        $student->name = request('name');
        $student->adm_no = request('adm_no');
        $student->dormitory = request('dormitory');
        $student->date_of_birth = request('date_of_birth');
        $student->parent = request('parent');
        $student->class = request('class');

        $student->update();

        return redirect('/students_index')->with('mssg','student updated successfully');
    }

    public function destroy($id){
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect('/students_index')->with('mssg','student deleted successfully');
    }

    public function edit($id){
        $dormitories = Dormitory::All();
        $student = Student::findOrFail($id);
        $clases = Clas::all();

        return view('students.edit', compact('student','clases','dormitories'));
    }

    public function search(){
        $dormitory = Dormitory::All();
        $clases = Clas::all();
        $search = request('search');

        if($search){
            $students = Student::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $students = Student::paginate(20);
        }

        return view('students.index', compact('students','clases','dormitory'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }
    
    public function index(){
        $students = Student::Paginate(5);

        return view('students.index', compact('students'));
    }

    public function store(){
        $student = new Student();

        $student->name = request('name');
        $student->adm_no = request('adm_no');
        $student->date_of_birth = request('date_of_birth');
        $student->parent = request('parent');
        $student->class = request('class');
        

        $student->save();

        return redirect('/students_index')->with('mssg','student created successfully');
    }

    public function update($id){
        $student = Student::findOrFail($id);

        $student->name = request('name');
        $student->adm_no = request('adm_no');
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
        $student = Student::findOrFail($id);

        return view('students.edit', compact('student'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $students = Student::where('name','LIKE',"%{$search}%")->paginate(3);
        }else{
            $students = Student::paginate(5);
        }

        return view('students.index', compact('students'));
    }
}

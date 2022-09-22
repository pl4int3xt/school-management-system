<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }
    
    public function index(){
        $clases = Clas::all();
        $teachers = Teacher::paginate(20);
        return view('teachers.index', compact('teachers','clases'));
    }

    public function store(){
        $teacher = new Teacher();

        request()->validate([
            'name'=>'required',
            'contact'=>'required',
            'subjects'=>'required',
        ]);

        $teacher->name = request('name');
        $teacher->contact = request('contact');
        $teacher->class = request('class');
        $teacher->subjects = request('subjects');
        $teacher->is_class_teacher = request('is_class_teacher');

        $teacher->save();

        return redirect('/teachers_index')->with('mssg','teacher created successfully');
    }

    public function update($id){
        $teacher = Teacher::findOrFail($id);

        request()->validate([
            'name'=>'required',
            'contact'=>'required',
            'subjects'=>'required',
        ]);
        
        $teacher->name = request('name');
        $teacher->contact = request('contact');
        $teacher->class = request('class');
        $teacher->subjects = request('subjects');
        $teacher->is_class_teacher = request('is_class_teacher');

        $teacher->update();

        return redirect('/teachers_index')->with('mssg','teacher updated successfully');
    }

    public function destroy($id){
        $teacher = Teacher::findOrFail($id);

        $teacher->delete();

        return redirect('/teachers_index')->with('mssg','teacher deleted successfully');
    }

    public function edit($id){
        $clases = Clas::all();
        $teacher = Teacher::findorFail($id);

        return view('teachers.edit', compact('teacher','clases'));
    }

    public function search(){
        $search = request('search');
        $clases = Clas::all();

        if($search){
            $teachers = Teacher::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $teachers = Teacher::paginate(20);
        }

        return view('teachers.index', compact('teachers','clases'));
    }
}

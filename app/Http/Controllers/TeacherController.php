<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }
    
    public function index(){
        $teachers = Teacher::paginate(5);
        return view('teachers.index', compact('teachers'));
    }

    public function store(){
        $teacher = new Teacher();

        $teacher->name = request('name');
        $teacher->contact = request('contact');
        $teacher->class = request('class');
        $teacher->subjects = request('subjects');

        $teacher->save();

        return redirect('/teachers_index')->with('mssg','teacher created successfully');
    }

    public function update($id){
        $teacher = Teacher::findOrFail($id);

        $teacher->name = request('name');
        $teacher->contact = request('contact');
        $teacher->class = request('class');
        $teacher->subjects = request('subjects');

        $teacher->update();

        return redirect('/teachers_index')->with('mssg','teacher updated successfully');
    }

    public function destroy($id){
        $teacher = Teacher::findOrFail($id);

        $teacher->delete();

        return redirect('/teachers_index')->with('mssg','teacher deleted successfully');
    }

    public function edit($id){
        $teacher = Teacher::findorFail($id);

        return view('teachers.edit', compact('teacher'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $teachers = Teacher::where('name','LIKE',"%{$search}%")->paginate(5);
        }else{
            $teachers = Teacher::paginate(5);
        }

        return view('teachers.index', compact('teachers'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index(){
        $subjects = Subject::Paginate(20);

        return view('subjects.index', compact('subjects'));
    }

    public function store(){
        $subject = new Subject();

        request()->validate([
            'name'=>'required',
        ]);

        $subject->name = request('name');

        $subject->save();

        return redirect('/subjects_index')->with('mssg','subject created successfully');
    }

    public function update($id){
        $subject = Subject::findOrFail($id);

        request()->validate([
            'name'=>'required',
        ]);

        $subject->name = request('name');

        $subject->update();

        return redirect('/subjects_index')->with('mssg','subject updated successfully');
    }

    public function destroy($id){
        $subject = Subject::findOrFail($id);

        $subject->delete();

        return redirect('/subjects_index')->with('mssg','subject deleted successfully');
    }

    public function edit($id){
        $subject = Subject::findOrFail($id);

        return view('subjects.edit', compact('subject'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $subjects = Subject::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $subjects = Subject::paginate(20);
        }

        return view('subjects.index', compact('subjects'));
    }
}

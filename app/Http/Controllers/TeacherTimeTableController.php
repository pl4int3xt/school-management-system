<?php

namespace App\Http\Controllers;

use App\Models\TeacherTimeTable;
use Illuminate\Http\Request;

class TeacherTimeTableController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isTeacher']);
    }

    public function index(){
        $teachers_timetables = TeacherTimeTable::Paginate(20);

        return view('teachers_timetables.index', compact('teachers_timetables'));
    }

    public function store(){
        $teachers_timetable = new TeacherTimeTable();

        request()->validate([
            'subject_name'=>'required',
            'time'=>'required',
            'class'=>'required',
            'term_period'=>'required',
        ]);

        $teachers_timetable->subject_name = request('subject_name');
        $teachers_timetable->time = request('time');        
        $teachers_timetable->class = request('class');
        $teachers_timetable->term_period = request('term_period');

        $teachers_timetable->save();

        return redirect('/teachers_timetables_index')->with('mssg','teachers_timetable created successfully');
    }

    public function update($id){
        $teachers_timetable = TeacherTimeTable::findOrFail($id);

        request()->validate([
            'subject_name'=>'required',
            'time'=>'required',
            'class'=>'required',
            'term_period'=>'required',
        ]);
        
        $teachers_timetable->subject_name = request('subject_name');
        $teachers_timetable->time = request('time');        
        $teachers_timetable->class = request('class');
        $teachers_timetable->term_period = request('term_period');

        $teachers_timetable->update();

        return redirect('/teachers_timetables_index')->with('mssg','teachers_timetable updated successfully');
    }

    public function destroy($id){
        $teachers_timetable = TeacherTimeTable::findOrFail($id);

        $teachers_timetable->delete();

        return redirect('/teachers_timetables_index')->with('mssg','teachers_timetable deleted successfully');
    }

    public function edit($id){
        $teachers_timetable = TeacherTimeTable::findOrFail($id);

        return view('teachers_timetables.edit', compact('teachers_timetable'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $teachers_timetables = TeacherTimeTable::where('subject_name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $teachers_timetables = TeacherTimeTable::paginate(20);
        }

        return view('teachers_timetables.index', compact('teachers_timetables'));
    }
}

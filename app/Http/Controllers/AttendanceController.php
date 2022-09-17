<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isTeacher']);
    }

    public function index(){
        $attendances = Attendance::Paginate(5);

        return view('attendances.index', compact('attendances'));
    }

    public function store(){
        $attendance = new Attendance();

        $attendance->name = request('name');
        $attendance->attendance = request('attendance');    
        $attendance->date = request('date');

        $attendance->save();

        return redirect('/attendances_index')->with('mssg','attendance created successfully');
    }

    public function update($id){
        $attendance = Attendance::findOrFail($id);

        $attendance->name = request('name');
        $attendance->attendance = request('attendance');
        $attendance->date = request('date');

        $attendance->update();

        return redirect('/attendances_index')->with('mssg','attendance updated successfully');
    }

    public function destroy($id){
        $attendance = Attendance::findOrFail($id);

        $attendance->delete();

        return redirect('/attendances_index')->with('mssg','attendance deleted successfully');
    }

    public function edit($id){
        $attendance = Attendance::findOrFail($id);

        return view('attendances.edit', compact('attendance'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $attendances = Attendance::where('name','LIKE',"%{$search}%")->paginate(3);
        }else{
            $attendances = Attendance::paginate(5);
        }

        return view('attendances.index', compact('attendances'));
    }
}

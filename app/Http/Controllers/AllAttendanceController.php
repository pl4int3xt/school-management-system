<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AllAttendanceController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isTeacher']);
    }

    public function index(){
        $teachers = Teacher::All();
        $attendances = Attendance::paginate(20);

        return view('all_attendances.index', compact('attendances','teachers'));
    }

    public function update($id){
        request()->validate([
            'name'=>'required',
            'attendance'=>'required',
            'class'=>'required',
            'date'=>'required',
        ]);

        $attendance = Attendance::findOrFail($id);

        $attendance->name = request('name');
        $attendance->attendance = request('attendance');
        $attendance->class = request('class');
        $attendance->date = request('date');

        $attendance->update();

        return redirect('/all_attendances_index')->with('mssg','attendance updated successfully');
    }

    public function destroy($id){
        $attendances = Attendance::findOrFail($id);

        $attendances->delete();

        return redirect('/all_attendances_index')->with('mssg','deleted successfully');
    }

    public function edit($id){
        $attendance = Attendance::findOrFail($id);

        return view('all_attendances.edit', compact('attendance'));
    }

    public function search(){
        $teachers = Teacher::All();
        $search = request('search');

        if($search){
            $attendances = Attendance::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $attendances = Attendance::paginate(20);
        }

        return view('all_attendances.index', compact('attendances','teachers'));
    }
}

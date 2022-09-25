<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Result;
use Illuminate\Http\Request;

class AllResultController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isTeacher']);
    }

    public function index(){
        $teachers = Teacher::All();  
        $subjects = Subject::All();
        $results = Result::Paginate(20);
        

        return view('all_results.index', compact('subjects','teachers','results'));
    }

    public function update($id){
        $result = Result::findOrFail($id);

        request()->validate([
            'name'=>'required',
            'class'=>'required',
            'results'=>'required',
            'term_period'=>'required',
        ]);
        
        $result->name = request('name');
        $result->class = request('class');
        $result->results = request('results');
        $result->term_period = request('term_period');

        $result->update();

        return redirect('/all_results_index')->with('mssg','result updated successfully');
    }

    public function destroy($id){
        $result = Result::findOrFail($id);

        $result->delete();

        return redirect('/all_results_index')->with('mssg','result deleted successfully');
    }

    public function search(){
        $teachers = Teacher::All();
        $subjects = Subject::All();
        $search = request('search');

        if($search){
            $results = Result::where('term_period','LIKE',"%{$search}%")->paginate(20);
        }else{
            $results = Result::paginate(20);
        }

        return view('all_results.index', compact('results','subjects','teachers'));
    }
}

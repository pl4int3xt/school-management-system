<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isTeacher']);
    }

    public function index(){
        $results = Result::Paginate(20);

        return view('results.index', compact('results'));
    }

    public function store(){
        $result = new Result();

        request()->validate([
            'name'=>'required',
            'class'=>'required',
            'results'=>'required',
            'position'=>'required',
            'term_period'=>'required',
        ]);

        $result->name = request('name');
        $result->class = request('class');
        $result->results = request('results');
        $result->position = request('position');
        $result->term_period = request('term_period');;
        

        $result->save();

        return redirect('/results_index')->with('mssg','result created successfully');
    }

    public function update($id){
        $result = Result::findOrFail($id);

        request()->validate([
            'name'=>'required',
            'class'=>'required',
            'results'=>'required',
            'position'=>'required',
            'term_period'=>'required',
        ]);
        
        $result->name = request('name');
        $result->class = request('class');
        $result->results = request('results');
        $result->position = request('position');
        $result->term_period = request('term_period');

        $result->update();

        return redirect('/results_index')->with('mssg','result updated successfully');
    }

    public function destroy($id){
        $result = Result::findOrFail($id);

        $result->delete();

        return redirect('/results_index')->with('mssg','result deleted successfully');
    }

    public function edit($id){
        $result = Result::findOrFail($id);

        return view('results.edit', compact('result'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $results = Result::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $results = Result::paginate(20);
        }

        return view('results.index', compact('results'));
    }
}

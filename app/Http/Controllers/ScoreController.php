<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isTeacher']);
    }

    public function index(){
        $scores = Score::Paginate(5);

        return view('scores.index', compact('scores'));
    }

    public function store(){
        $score = new Score();

        $score->name = request('name');
        $score->scores = request('scores');        
        $score->term_period = request('term_period');

        $score->save();

        return redirect('/scores_index')->with('mssg','score created successfully');
    }

    public function update($id){
        $score = Score::findOrFail($id);

        $score->name = request('name');
        $score->scores = request('scores');
        $score->term_period = request('term_period');

        $score->update();

        return redirect('/scores_index')->with('mssg','score updated successfully');
    }

    public function destroy($id){
        $score = Score::findOrFail($id);

        $score->delete();

        return redirect('/scores_index')->with('mssg','score deleted successfully');
    }

    public function edit($id){
        $score = Score::findOrFail($id);

        return view('scores.edit', compact('score'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $scores = Score::where('name','LIKE',"%{$search}%")->paginate(3);
        }else{
            $scores = Score::paginate(5);
        }

        return view('scores.index', compact('scores'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isTeacher']);
    }

    public function index(){
        $clases = Clas::all();
        $scores = Score::Paginate(20);

        return view('scores.index', compact('scores','clases'));
    }

    public function store(){
        $score = new Score();

        request()->validate([
            'name'=>'required',
            'scores'=>'required',
            'term_period'=>'required',
        ]);

        $score->name = request('name');
        $score->scores = request('scores');        
        $score->term_period = request('term_period');

        $score->save();

        return redirect('/scores_index')->with('mssg','score created successfully');
    }

    public function update($id){
        $score = Score::findOrFail($id);

        request()->validate([
            'name'=>'required',
            'scores'=>'required',
            'term_period'=>'required',
        ]);
        
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
        $clases = Clas::all();

        if($search){
            $scores = Score::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $scores = Score::paginate(20);
        }

        return view('scores.index', compact('scores','clases'));
    }
}

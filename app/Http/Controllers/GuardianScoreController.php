<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class GuardianScoreController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isGuardian']);
    }

    public function index(){
        $scores = Score::Paginate(5);

        return view('guardians_scores.index', compact('scores'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $scores = Score::where('name','LIKE',"%{$search}%")->paginate(3);
        }else{
            $scores = Score::paginate(5);
        }

        return view('guardians_scores.index', compact('scores'));
    }
}

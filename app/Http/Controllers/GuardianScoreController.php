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
        $scores = Score::Paginate(20);

        return view('guardians_scores.index', compact('scores'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $scores = Score::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $scores = Score::paginate(20);
        }

        return view('guardians_scores.index', compact('scores'));
    }
}

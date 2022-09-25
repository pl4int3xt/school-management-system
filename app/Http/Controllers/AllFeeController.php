<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;

class AllFeeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isFinance']);
    }

    public function index(){
        $fees = Fee::paginate(20);

        return view('all_fees.index', compact('fees'));
    }

    public function destroy($id){
        $fees = Fee::findOrFail($id);

        $fees->delete();

        return redirect('/all_fees_index')->with('mssg','clas deleted successfully');
    }

    public function search(){
        $search = request('search');

        if($search){
            $fees = Fee::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $fees = Fee::paginate(20);
        }

        return view('all_fees.index', compact('fees'));
    }
}

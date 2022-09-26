<?php

namespace App\Http\Controllers;

use App\Models\Dormitory;
use Illuminate\Http\Request;

class DormitoryController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index(){
        $dormitories = Dormitory::Paginate(20);

        return view('dormitories.index', compact('dormitories'));
    }

    public function store(){
        $dormitory = new Dormitory();

        request()->validate([
            'name'=>'required',
        ]);

        $dormitory->name = request('name');

        $dormitory->save();

        return redirect('/dormitories_index')->with('mssg','subject created successfully');
    }

    public function update($id){
        $dormitory = Dormitory::findOrFail($id);

        request()->validate([
            'name'=>'required',
        ]);

        $dormitory->name = request('name');

        $dormitory->update();

        return redirect('/dormitories_index')->with('mssg','subject updated successfully');
    }

    public function destroy($id){
        $dormitory = Dormitory::findOrFail($id);

        $dormitory->delete();

        return redirect('/dormitories_index')->with('mssg','subject deleted successfully');
    }

    public function edit($id){
        $dormitory = Dormitory::findOrFail($id);

        return view('dormitories.edit', compact('dormitory'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $dormitories = Dormitory::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $dormitories = Dormitory::paginate(20);
        }

        return view('subjects.index', compact('dormitories'));
    }
}

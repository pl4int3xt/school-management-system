<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use Illuminate\Http\Request;

class ClasController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index(){
        $clases = Clas::Paginate(20);

        return view('clases.index', compact('clases'));
    }

    public function store(){
        $clas = new Clas();

        request()->validate([
            'name'=>'required',
        ]);

        $clas->name = request('name');
        $clas->other_details = request('other_details');

        $clas->save();

        return redirect('/clases_index')->with('mssg','class added successfully');
    }

    public function update($id){
        $clas = Clas::findOrFail($id);

        request()->validate([
            'name'=>'required',
        ]);
        
        $clas->name = request('name');
        $clas->other_details = request('other_details');

        $clas->update();

        return redirect('/clases_index')->with('mssg','class updated successfully');
    }

    public function destroy($id){
        $clas = Clas::findOrFail($id);

        $clas->delete();

        return redirect('/clases_index')->with('mssg','clas deleted successfully');
    }

    public function edit($id){
        $clas = Clas::findOrFail($id);

        return view('clases.edit', compact('clas'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $clases = Clas::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $clases = Clas::paginate(20);
        }

        return view('clases.index', compact('clases'));
    }
}

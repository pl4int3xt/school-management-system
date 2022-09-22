<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }
    
    public function index(){
        $guardians = Guardian::paginate(20);

        return view('guardians.index', compact('guardians'));
    }

    public function store(){
        $guardian = new Guardian();

        request()->validate([
            'name'=>'required',
            'contact'=>'required',
            'relationship'=>'required',
            'student'=>'required',
        ]);
        
        $guardian->name = request('name');
        $guardian->contact = request('contact');
        $guardian->relationship = request('relationship');
        $guardian->student = request('student');

        $guardian->save();

        return redirect('/guardians_index')->with('mssg','guardian created successfully');
    }

    public function update($id){
        $guardian = Guardian::findOrFail($id);

        request()->validate([
            'name'=>'required',
            'contact'=>'required',
            'relationship'=>'required',
            'student'=>'required',
        ]);
        
        $guardian->name = request('name');
        $guardian->contact = request('contact');
        $guardian->relationship = request('relationship');
        $guardian->student = request('student');

        $guardian->update();
        return redirect('/guardians_index')->with('mssg','guardian updatedd successfully');
    }

    public function destroy($id){
        $guardian = Guardian::findOrFail($id);

        $guardian->delete();

        return redirect('/guardians_index')->with('mssg','guardian deleted successfully');
    }

    public function edit($id){
        $guardian = Guardian::findOrFail($id);

        return view('guardians.edit', compact('guardian'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $guardians = Guardian::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $guardians = Guardian::paginate(20);
        }

        return view('guardians.index', compact('guardians'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }
    
    public function index(){
        $workers = Worker::Paginate(20);

        return view('workers.index', compact('workers'));
    }

    public function store(){
        
        request()->validate([
            'name'=>'required',
            'contact'=>'required',
            'area_of_work'=>'required',
            'salary'=>'required',
        ]);

        $worker = new Worker();

        $worker->name = request('name');
        $worker->contact = request('contact');
        $worker->area_of_work = request('area_of_work');
        $worker->salary = request('salary');
        

        $worker->save();

        return redirect('/workers_index')->with('mssg','worker created successfully');
    }

    public function update($id){
        
        request()->validate([
            'name'=>'required',
            'contact'=>'required',
            'area_of_work'=>'required',
            'salary'=>'required',
        ]);

        $worker = Worker::findOrFail($id);

        $worker->name = request('name');
        $worker->contact = request('contact');
        $worker->area_of_work = request('area_of_work');
        $worker->salary = request('salary');

        $worker->update();

        return redirect('/workers_index')->with('mssg','worker updated successfully');
    }

    public function destroy($id){
        $worker = Worker::findOrFail($id);

        $worker->delete();

        return redirect('/workers_index')->with('mssg','worker deleted successfully');
    }

    public function edit($id){
        $worker = Worker::findOrFail($id);

        return view('workers.edit', compact('worker'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $workers = Worker::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $workers = Worker::paginate(20);
        }

        return view('workers.index', compact('workers'));
    }
}

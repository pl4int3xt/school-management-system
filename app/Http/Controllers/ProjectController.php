<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }
    
    public function index(){
        $projects = Project::Paginate(5);

        return view('projects.index', compact('projects'));
    }

    public function store(){
        $project = new Project();

        $project->name = request('name');
        $project->cost = request('cost');
        $project->other_details = request('other_details');

        $project->save();

        return redirect('/projects_index')->with('mssg','project created successfully');
    }

    public function update($id){
        $project = Project::findOrFail($id);

        $project->name = request('name');
        $project->cost = request('cost');
        $project->other_details = request('other_details');

        $project->update();

        return redirect('/projects_index')->with('mssg','project updated successfully');
    }

    public function destroy($id){
        $project = Project::findOrFail($id);

        $project->delete();

        return redirect('/projects_index')->with('mssg','project deleted successfully');
    }

    public function edit($id){
        $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $projects = Project::where('name','LIKE',"%{$search}%")->paginate(3);
        }else{
            $projects = Project::paginate(5);
        }

        return view('projects.index', compact('projects'));
    }
}

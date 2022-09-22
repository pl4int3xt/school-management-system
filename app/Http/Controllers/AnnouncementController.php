<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }
    
    public function index(){
        $announcements = Announcement::Paginate(20);

        return view('announcements.index', compact('announcements'));
    }

    public function store(){
        $announcement = new Announcement();

        request()->validate([
            'department'=>'required',
            'description'=>'required',
        ]);

        $announcement->description= request('description');
        $announcement->department = request('department');
        

        $announcement->save();

        return redirect('/announcements_index')->with('mssg','announcement created successfully');
    }

    public function update($id){
        $announcement = Announcement::findOrFail($id);

        request()->validate([
            'department'=>'required',
            'description'=>'required',
        ]);

        $announcement->description= request('description');
        $announcement->department = request('department');

        $announcement->update();

        return redirect('/announcements_index')->with('mssg','announcement updated successfully');
    }

    public function destroy($id){
        $announcement = Announcement::findOrFail($id);

        $announcement->delete();

        return redirect('/announcements_index')->with('mssg','announcement deleted successfully');
    }

    public function edit($id){
        $announcement = Announcement::findOrFail($id);

        return view('announcements.edit', compact('announcement'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $announcements = Announcement::where('description','LIKE',"%{$search}%")->paginate(20);
        }else{
            $announcements = Announcement::paginate(20);
        }

        return view('announcements.index', compact('announcements'));
    }
}

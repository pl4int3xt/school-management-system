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
        $announcements = Announcement::Paginate(5);

        return view('announcements.index', compact('announcements'));
    }

    public function store(){
        $announcement = new Announcement();

        $announcement->description= request('description');
        $announcement->department = request('department');
        

        $announcement->save();

        return redirect('/announcements_index')->with('mssg','announcement created successfully');
    }

    public function update($id){
        $announcement = Announcement::findOrFail($id);

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
            $announcements = Announcement::where('description','LIKE',"%{$search}%")->paginate(3);
        }else{
            $announcements = Announcement::paginate(5);
        }

        return view('announcements.index', compact('announcements'));
    }
}

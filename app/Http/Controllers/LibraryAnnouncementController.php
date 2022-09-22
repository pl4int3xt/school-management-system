<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class LibraryAnnouncementController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isLibrarian']);
    }

    public function index(){
        $announcements = Announcement::Paginate(20);

        return view('libraries_announcements.index', compact('announcements'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $announcements = Announcement::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $announcements = Announcement::paginate(20);
        }

        return view('libraries_announcements.index', compact('announcements'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class TeacherAnnouncementController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isTeacher']);
    }

    public function index(){
        $announcements = Announcement::Paginate(5);

        return view('teachers_announcements.index', compact('announcements'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $announcements = Announcement::where('name','LIKE',"%{$search}%")->paginate(3);
        }else{
            $announcements = Announcement::paginate(5);
        }

        return view('teachers_announcements.index', compact('announcements'));
    }
}

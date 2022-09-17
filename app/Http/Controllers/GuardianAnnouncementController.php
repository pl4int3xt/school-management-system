<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class GuardianAnnouncementController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isGuardian']);
    }

    public function index(){
        $announcements = Announcement::Paginate(5);

        return view('guardians_announcements.index', compact('announcements'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $announcements = Announcement::where('description','LIKE',"%{$search}%")->paginate(3);
        }else{
            $announcements = Announcement::paginate(5);
        }

        return view('guardians_announcements.index', compact('announcements'));
    }
}

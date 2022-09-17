@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(Auth::user()->role == "admin")
            <div class="row my-4">
                <div class="col-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Students</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Student::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Teachers</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Teacher::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Guardians</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Guardian::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Users</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\User::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow-sm" >
                        <div class="card-body">
                            <h3>Workers</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Worker::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Announcements</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Announcement::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3>Projects</h3>
                        <h3>Total</h3>
                        <h4>{{ \App\Models\Project::all()->count() }}</h4>
                    </div>
                </div>
                </div>
            </div>
        @endif   

        @if(Auth::user()->role == "teacher")
            <div class="row my-4">
                <div class="col-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Attendances</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Attendance::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Class Scores</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Score::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Results</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Result::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-4">
                    <div class="card shadow-sm" style="background-color: light-blue">
                        <div class="card-body">
                            <h3>Time Tables</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\TeacherTimeTable::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Announcement</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Announcement::all()->where('department','teacher')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if(Auth::user()->role == "guardian")
            <div class="row my-4">
                <div class="col-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Announcement</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Announcement::all()->where('department','guardian')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if(Auth::user()->role == "librarian")
            <div class="row my-4">
                <div class="col-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Books</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Library::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Announcements</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Announcement::all()->where('department','librarian')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if(Auth::user()->role == "finance")
            <div class="row my-4">
                <div class="col-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Fees</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Fee::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow-sm">
                        <div class="card-body card-success">
                            <h3>Announcements</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Announcement::all()->where('department','finance')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

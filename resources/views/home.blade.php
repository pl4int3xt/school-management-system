@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12">
            @if(Auth::user()->role == "admin")
                <div class="row my-4">
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-white bg-danger shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Students</h3>
                                        <h3>Total</h3>
                                        <h4>{{ \App\Models\Student::all()->count() }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-white bg-warning shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Classes</h3>
                                        <h3>Total</h3>
                                        <h4>{{ \App\Models\Clas::all()->count() }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-white bg-primary shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Teachers</h3>
                                        <h3>Total</h3>
                                        <h4>{{ \App\Models\Teacher::all()->count() }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-white bg-secondary shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Guardians</h3>
                                        <h3>Total</h3>
                                        <h4>{{ \App\Models\Guardian::all()->count() }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-white bg-success shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Users</h3>
                                        <h3>Total</h3>
                                        <h4>{{ \App\Models\User::all()->count() }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-white bg-info shadow-sm" >
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Workers</h3>
                                        <h3>Total</h3>
                                        <h4>{{ \App\Models\Worker::all()->count() }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-white bg-dark mb-3 shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Announcements</h3>
                                        <h3>Total</h3>
                                        <h4>{{ \App\Models\Announcement::all()->count() }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-white shadow-sm" style="background-color:#CB4B16">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Projects</h3>
                                        <h3>Total</h3>
                                        <h4>{{ \App\Models\Project::all()->count() }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-white shadow-sm" style="background-color:#D33682">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Subjects</h3>
                                        <h3>Total</h3>
                                        <h4>{{ \App\Models\Subject::all()->count() }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif   

            @if(Auth::user()->role == "teacher")
                <div class="row my-4">
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-white bg-danger shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Results</h3>
                                        <h3>Total</h3>
                                        <h4>{{ \App\Models\Result::all()->count() }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-white bg-primary shadow-sm" style="background-color: light-blue">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Time Tables</h3>
                                        <h3>Total</h3>
                                        <h4>{{ \App\Models\TeacherTimeTable::all()->count() }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-white bg-success shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Announcement</h3>
                                        <h3>Total</h3>
                                        <h4>{{ \App\Models\Announcement::all()->where('department','teacher')->count() }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(Auth::user()->role == "guardian")
                <div class="row my-4">
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-white bg-success shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Announcement</h3>
                                        <h3>Total</h3>
                                        <h4>{{ \App\Models\Announcement::all()->where('department','guardian')->count() }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(Auth::user()->role == "librarian")
                <div class="row my-4">
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-white bg-success shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Books</h3>
                                        <h3>Total</h3>
                                        <h4>{{ \App\Models\Book::all()->count() }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-white bg-danger shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Announcements</h3>
                                        <h3>Total</h3>
                                        <h4>{{ \App\Models\Announcement::all()->where('department','librarian')->count() }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(Auth::user()->role == "finance")
                <div class="row my-4">
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-white bg-success shadow-sm">
                            <div class="card-body card-success">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Announcements</h3>
                                        <h3>Total</h3>
                                        <h4>{{ \App\Models\Announcement::all()->where('department','finance')->count() }}</h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection

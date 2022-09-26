@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('Teachers Timetable') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- search form -->
                    <div class="container m-4">
                            <div class="row">
                                <div class="col-8">
                                    <div class="container text-start">
                                        <a href="#" class="btn btn-outline-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#teacher_timetable-reg-modal">
                                            <i class="fa-solid fa-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col text-end">
                                    <form action="{{ route('teachers_timetables.search') }}" method="get">
                                        <input class="form-control" type="text" name="search" placeholder="search here ....."><br>
                                        <button type="submit" class="btn btn-outline-primary rounded-pill">
                                            <i class="fa-solid fa-search"></i>
                                        </button> 
                                    </form>
                                </div>
                            </div>   
                    </div>

                    <div class="container p-0">
                        @if (session('mssg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mssg') }}
                            </div>
                        @endif

                        <!-- members registration table -->
                        <div class="container table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Time</th>
                                        <th>Class</th>
                                        <th>Term period</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers_timetables as $teachers_timetable) 
                                        @if (Auth::user()->name == $teachers_timetable->name)
                                            <tr>
                                                <td>{{ $teachers_timetable->subject_name }}</td>
                                                <td>{{ $teachers_timetable->time }}</td>
                                                <td>{{ $teachers_timetable->class }}</td>
                                                <td>{{ $teachers_timetable->term_period }}</td>
                                                <td>
                                                    <a href="{{ url('/teachers_timetables_edit/'.$teachers_timetable->id) }}" class="btn btn-outline-primary rounded-pill">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="{{ url('/teachers_timetables_destroy/'.$teachers_timetable->id)}}"class="btn btn-outline-primary rounded-pill">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $teachers_timetables->onEachSide(1)->links() }}
                        </div>
                        <!-- registration modal -->

                        <div class="modal fade" id="teacher_timetable-reg-modal" aria-labelledby="modal-title" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Timetable registration</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('teachers_timetables.store') }}" method="post">
                                            @csrf

                                            <input type="hidden" name="name" value="{{ Auth::user()->name }}">

                                            <label for="subject_name" class="form-label">Subject name:</label>
                                            <select id="subject_name" class="form-select" name="subject_name" required="True">
                                                @foreach($subjects as $subject)
                                                        <option value="{{ $subject->name }}">{{ $subject->name }}</option>        
                                                @endforeach
                                            </select>
                                            
                                            <label for="time" class="form-label">Time:</label>
                                            <input type="tel" class="form-control" id="time" name="time" required="True">

                                            <label for="class" class="form-label">Class:</label>
                                            <select id="class" class="form-select" name="class" required="True">
                                                @foreach($clases as $clas)
                                                        <option value="{{ $clas->name }}">{{ $clas->name }}</option>        
                                                @endforeach
                                            </select>

                                            <label for="term_period" class="form-label">Term period:</label>
                                            <input type="text" class="form-control" id="term_period" name="term_period" required="True">

                                            <div class="modal-footer">
                                                <div class="container">
                                                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                                                        <i class="fa-solid fa-paper-plane"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
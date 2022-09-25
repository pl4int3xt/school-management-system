@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Time table') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/teachers_timetables_update/'.$teachers_timetable->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="subject_name" class="form-label">Subject Name:</label>
                        <input type="text" class="form-control" id="subject_name" name="subject_name" required="True" value="{{ $teachers_timetable->subject_name }}">

                        <label for="time" class="form-label">Time:</label>
                        <input type="tel" class="form-control" id="time" name="time" required="True" value="{{ $teachers_timetable->time }}">

                        <label for="class" class="form-label">class:</label>
                        <input type="text" class="form-control" id="class" name="class" required="True" value="{{ $teachers_timetable->class }}">

                        <label for="term_period" class="form-label">Term period:</label>
                        <input type="text" class="form-control" id="term_period" name="term_period" required="True" value="{{ $teachers_timetable->term_period }}">

                        <br>
                        <div class="modal-footer">
                            <div class="container">
                                <a href="{{ url('teachers_timetables_index') }}" class="btn btn-outline-primary rounded-pill">
                                    <i class="fa-solid fa-times"></i>
                                </a>
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
@endsection
@extends('layouts.home')

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
                        
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">

                        <label for="subject_name" class="form-label">Subject Name:</label>
                        <select id="subject_name" class="form-select" name="subject_name" required="True">
                            @foreach($subjects as $subject)
                                    <option value="{{ $subject->name }}" {{ $subject->name == $teachers_timetable->subject_name ? 'selected' : ''}}>{{ $subject->name }}</option>        
                            @endforeach
                        </select>

                        <label for="time" class="form-label">Time:</label>
                        <input type="tel" class="form-control" id="time" name="time" required="True" value="{{ $teachers_timetable->time }}">

                        <label for="class" class="form-label">Class:</label>
                        <select id="class" class="form-select" name="class" required="True">
                            @foreach($clases as $clas)
                                    <option value="{{ $clas->name }}" {{ $clas->name == $teachers_timetable->class ? 'selected' : ''}}>{{ $clas->name }}</option>        
                            @endforeach
                        </select>

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
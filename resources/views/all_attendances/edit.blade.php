@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Attendance') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/all_attendances_update/'.$attendance->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $attendance->name }}">

                        <label for="class" class="form-label">Class:</label>
                        <input type="text" class="form-control" id="class" name="class" required="True" value="{{ $attendance->class }}">
                            
                        <label for="attendance" class="form-label">Attendance:</label>
                        <select id="attendance" class="form-select" name="attendance" required="True" selected="{{ $attendance->attendance }}">
                            <option selected disabled hidden>{{ $attendance->attendance }}</option>
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                        </select>

                        <label for="date" class="form-label">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required="True" value="{{ $attendance->date }}">

                        <br>
                        <div class="modal-footer">
                            <div class="container">
                                <a href="{{ url('all_attendances_index') }}" class="btn btn-outline-primary rounded-pill">
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
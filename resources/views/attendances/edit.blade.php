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
                    <form action="{{ route('attendances.store') }}" method="post">
                        @csrf
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $attendance->name }}">

                        @foreach ($teachers as $teacher)
                            @if(Auth::user()->name == $teacher->name)
                                <label for="class" class="form-label">Class:</label>
                                <input type="text" class="form-control" id="class" name="class" required="True" value="{{ $teacher->class }}">
                            @endif
                        @endforeach 
                        
                        <label for="attendance" class="form-label">Attendance:</label>
                        <select id="attendance" class="form-select" name="attendance" required="True" selected="{{ $attendance->attendance }}">
                            <option selected disabled hidden>{{ $attendance->attendance }}</option>
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                        </select>

                        <label for="date" class="form-label">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required="True" value="{{ $attendance->date }}">

                        <div class="modal-footer">
                            <a href="{{ url('attendances_index') }}" class="btn btn-success rounded-pill">close</a>
                            <button type="submit" class="btn btn-success rounded-pill">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
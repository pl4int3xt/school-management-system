@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('attendances') }}</div>
                <div class="card-body">     
                    <div class="container p-0">
                        <div class="container table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Attendance</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        @foreach ($students as $student)
                                            @if(Auth::user()->name == $student->parent && $student->name == $attendance->name)
                                                <tr>
                                                    <td>{{ $attendance->name }}</td>
                                                    <td>{{ $attendance->class }}</td>
                                                    <td>{{ $attendance->attendance }}</td>
                                                    <td>{{ $attendance->date }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
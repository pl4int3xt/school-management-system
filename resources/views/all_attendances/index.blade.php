@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('Books') }}</div>

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
                
                                </div>
                                <div class="col text-end">
                                    <form action="{{ route('all_attendances.search') }}" method="get">
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
                                        @foreach ($teachers as $teacher)
                                            @if(Auth::user()->name == $teacher->name && $teacher->class == $attendance->class)
                                                <tr>
                                                    <td>{{ $attendance->name }}</td>
                                                    <td>{{ $attendance->class }}</td>
                                                    <td>{{ $attendance->attendance }}</td>
                                                    <td>{{ $attendance->date }}</td>
                                                    <td>
                                                        <a href="{{ url('/all_attendances_edit/'.$attendance->id) }}" class="btn btn-outline-primary rounded-pill">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <a href="{{ url('/all_attendances_destroy/'.$attendance->id)}}"class="btn btn-outline-primary rounded-pill">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $attendances->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
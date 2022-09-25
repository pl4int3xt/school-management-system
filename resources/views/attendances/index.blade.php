@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('Attendances') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container p-0">
                        @if (session('mssg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mssg') }}
                            </div>
                        @endif

                        <div class="container table-responsive">
                            <form action="{{ route('attendances.store') }}" method="post">
                                @csrf
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>attendance</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            @foreach($teachers as $teacher)
                                                @if( Auth::user()->name == $teacher->name && $teacher->class == $student->class) 
                                                    <tr>
                                                        <input hidden="true" type="text" name="id[]" value="{{ $student->id }}">
                                                        <td><input type="text" class="form-control" name="name[]" required="True" value="{{ $student->name }}"></td>
                                                        <td><input type="text" class="form-control" name="class[]" required="True" value="{{ $student->class }}"></td>
                                                        <td>
                                                            <select id="attendance" class="form-select" name="attendance[]" required="True">
                                                                <option value="present">Present</option>
                                                                <option value="absent">Absent</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="date" class="form-control" name="date[]" required="True"></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-outline-primary rounded-pill">
                                    <i class="fa-solid fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
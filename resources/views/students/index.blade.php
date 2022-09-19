@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('Students') }}</div>

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
                                        <a href="#" class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#member-reg-modal">Add</a>
                                    </div>
                                </div>
                                <div class="col text-end">
                                    <form action="{{ route('students.search') }}" method="get">
                                        <input class="form-control" type="text" name="search" placeholder="search here ....."><br>
                                        <button type="submit" class="btn btn-success rounded-pill">Search</button> 
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
                                        <th>Name</th>
                                        <th>Adm No</th>
                                        <th>Date of birth</th>
                                        <th>Guardian</th>
                                        <th>class</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student) 
                                        <tr>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->adm_no }}</td>
                                            <td>{{ $student->date_of_birth }}</td>
                                            <td>{{ $student->parent }}</td>
                                            <td>{{ $student->class }}</td>
                                            <td>
                                                <a href="{{ url('/students_edit/'.$student->id) }}" class="btn btn-success rounded-pill">Edit</a>
                                                <a href="{{ url('/students_destroy/'.$student->id)}}"class="btn btn-danger rounded-pill">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $students->onEachSide(1)->links() }}
                        </div>
                        <!-- registration modal -->

                        <div class="modal fade" id="member-reg-modal" aria-labelledby="modal-title" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Students registration</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('students.store') }}" method="post">
                                            @csrf
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" required="True">

                                            <label for="adm_no" class="form-label">Adm No:</label>
                                            <input type="text" class="form-control" id="adm_no" name="adm_no" required="True">

                                            <label for="date_of_birth" class="form-label">Date of birth:</label>
                                            <input type="tel" class="form-control" id="date_of_birth" name="date_of_birth" required="True">

                                            <label for="parent" class="form-label">Parent:</label>
                                            <input type="text" class="form-control" id="parent" name="parent" required="True">

                                            <label for="class" class="form-label">Class:</label>
                                            <select id="class" class="form-select" name="class" required="True">

                                            @foreach($clases as $clas)
                                                    <option value="{{ $clas->name }}">{{ $clas->name }}</option>        
                                            @endforeach
                                            
                                            </select>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success rounded-pill">
                                                    Submit
                                                </button>
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
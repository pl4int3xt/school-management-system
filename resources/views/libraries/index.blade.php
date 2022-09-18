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
                                    <div class="container text-start">
                                        <a href="#" class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#library-reg-modal">Add</a>
                                    </div>
                                </div>
                                <div class="col text-end">
                                    <form action="{{ route('libraries.search') }}" method="get">
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
                                        <th>Book Name</th>
                                        <th>Student Name</th>
                                        <th>Student Adm No</th>
                                        <th>Day borrowed</th>
                                        <th>Return date</th>
                                        <th>Returned</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($libraries as $library) 
                                        <tr>
                                            <td>{{ $library->book_name }}</td>
                                            <td>{{ $library->student_name }}</td>
                                            <td>{{ $library->student_adm_no }}</td>
                                            <td>{{ $library->day_borrowed }}</td>
                                            <td>{{ $library->return_date }}</td>
                                            <td>{{ $library->returned }}</td>
                                            <td>
                                                <a href="{{ url('/libraries_edit/'.$library->id) }}" class="btn btn-success rounded-pill">Edit</a>
                                                <a href="{{ url('/libraries_destroy/'.$library->id)}}"class="btn btn-danger rounded-pill">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $libraries->onEachSide(1)->links() }}
                        </div>
                        <!-- registration modal -->

                        <div class="modal fade" id="library-reg-modal" aria-labelledby="modal-title" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Book registration</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('libraries.store') }}" method="post">
                                            @csrf
                                            <label for="book_name" class="form-label">Book Name:</label>
                                            <input type="text" class="form-control" id="book_name" name="book_name" required="True">

                                            <label for="student_name" class="form-label">Student Name:</label>
                                            <input type="tel" class="form-control" id="student_name" name="student_name" required="True">

                                            <label for="student_adm_no" class="form-label">Student Adm No:</label>
                                            <input type="text" class="form-control" id="student_adm_no" name="student_adm_no" required="True">

                                            <label for="day_borrowed" class="form-label">Day Borrowed:</label>
                                            <input type="text" class="form-control" id="day_borrowed" name="day_borrowed" required="True">

                                            <label for="return_date" class="form-label">Return Date:</label>
                                            <input type="text" class="form-control" id="return_date" name="return_date" required="True">

                                            <label for="returned" class="form-label">Returned:</label>
                                            <select id="returned" class="form-select" name="returned" required="False">
                                                <option value="true">True</option>
                                                <option value="false">False</option>
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
@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('Fees') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- search form -->
                    <div class="container m-4">
                            <div class="row">
                                <div class="col text-end">
                                    <form action="{{ route('books.search') }}" method="get">
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
                            @foreach($students as $student)
                                <form action="{{ url('/books_store/') }}" method="post">
                                    @csrf          
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Student Name</th>
                                                <th>Student Adm No</th>
                                                <th>Book Name</th>
                                                <th>Day Borrowed</th>
                                                <th>Return Date</th>
                                                <th>Returned</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>  
                                            <tr>
                                                <td><input type="text" class="form-control" name="student_name" required="True" value="{{ $student->name }}"></td>
                                                <td><input type="text" class="form-control" name="student_adm_no" required="True" value="{{ $student->adm_no }}"></td>
                                                <td><input type="text" class="form-control" name="book_name" required="True"></td>
                                                <td><input type="date" class="form-control" name="day_borrowed" required="True"></td>
                                                <td><input type="date" class="form-control" name="return_date" required="True"></td>
                                                <td>
                                                    <select class="form-select" name="returned" required="False">
                                                        <option value="true">True</option>
                                                        <option value="false">False</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                                                        <i class="fa-solid fa-paper-plane"></i>
                                                    </button>
                                                </td>
                                            </tr>               
                                        </tbody>
                                    </table>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
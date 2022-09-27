@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('All Books') }}</div>

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
                                    <form action="{{ route('all_books.search') }}" method="get">
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
                                        <th>Student Name</th>
                                        <th>Student Adm No</th>
                                        <th>Book Name</th>
                                        <th>Day borrowed</th>
                                        <th>Return date</th>
                                        <th>Returned</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book) 
                                        <tr>    
                                            <td>{{ $book->student_name }}</td>
                                            <td>{{ $book->student_adm_no }}</td>
                                            <td>{{ $book->book_name }}</td>
                                            <td>{{ $book->day_borrowed }}</td>
                                            <td>{{ $book->return_date }}</td>
                                            <td>{{ $book->returned }}</td>
                                            <td>
                                                <a href="{{ url('/all_books_edit/'.$book->id) }}" class="btn btn-outline-primary rounded-pill">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="{{ url('/all_books_destroy/'.$book->id)}}"class="btn btn-outline-primary rounded-pill">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $books->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
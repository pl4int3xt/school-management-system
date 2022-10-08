@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Project') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/all_books_update/'.$book->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="student_name" class="form-label">Student Name:</label>
                        <input type="text" class="form-control" id="student_name" name="student_name" required="True" value="{{ $book->student_name }}">

                        <label for="student_adm_no" class="form-label">Student Adm No:</label>
                        <input type="text" class="form-control" id="student_adm_no" name="student_adm_no" required="True" value="{{ $book->student_adm_no }}">

                        <label for="book_name" class="form-label">Book Name:</label>
                        <input type="text" class="form-control" id="book_name" name="book_name" required="True" value="{{ $book->book_name }}">

                        <label for="day_borrowed" class="form-label">Day Borrowed:</label>
                        <input type="date" class="form-control" id="day_borrowed" name="day_borrowed" required="True" value="{{ $book->day_borrowed }}">

                        <label for="return_date" class="form-label">Return Date:</label>
                        <input type="date" class="form-control" id="return_date" name="return_date" required="True" value="{{ $book->return_date }}">

                        <label for="returned" class="form-label">Returned:</label>
                        <select id="returned" class="form-select" name="returned" required>
                            <option value="true">True</option>
                            <option value="false">False</option>
                        </select>

                        <br>
                        <div class="modal-footer">
                            <div class="container">
                                <a href="{{ url('all_books_index') }}" class="btn btn-outline-primary rounded-pill">
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
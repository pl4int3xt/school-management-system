@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Project') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/libraries_update/'.$library->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="book_name" class="form-label">Book Name:</label>
                        <input type="text" class="form-control" id="book_name" name="book_name" required="True" value="{{ $library->book_name }}">

                        <label for="student_name" class="form-label">Student Name:</label>
                        <input type="text" class="form-control" id="student_name" name="student_name" required="True" value="{{ $library->student_name }}">

                        <label for="student_adm_no" class="form-label">Student Adm No:</label>
                        <input type="text" class="form-control" id="student_adm_no" name="student_adm_no" required="True" value="{{ $library->student_adm_no }}">

                        <label for="day_borrowed" class="form-label">Day Borrowed:</label>
                        <input type="text" class="form-control" id="day_borrowed" name="day_borrowed" required="True" value="{{ $library->day_borrowed }}">

                        <label for="return_date" class="form-label">Return Date:</label>
                        <input type="text" class="form-control" id="return_date" name="return_date" required="True" value="{{ $library->return_date }}">

                        <label for="returned" class="form-label">Returned:</label>
                        <select id="returned" class="form-select" name="returned" required="False" selected="{{ $library->returned }}">
                            <option value="true">True</option>
                            <option value="false">False</option>
                        </select>

                        <div class="modal-footer">
                            <a href="{{ url('libraries_index') }}" class="btn btn-success rounded-pill">close</a>
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
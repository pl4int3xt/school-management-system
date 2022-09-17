@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Student') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/students_update/'.$student->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $student->name }}">

                        <label for="adm_no" class="form-label">Adm No:</label>
                        <input type="text" class="form-control" id="adm_no" name="adm_no" required="True" value="{{ $student->adm_no }}">

                        <label for="date_of_birth" class="form-label">Date of birth</label>
                        <input type="tel" class="form-control" id="date_of_birth" name="date_of_birth" required="True" value="{{ $student->date_of_birth }}">

                        <label for="parent" class="form-label">parent:</label>
                        <input type="text" class="form-control" id="parent" name="parent" required="True" value="{{ $student->parent }}">

                        <label for="class" class="form-label">class:</label>
                        <input type="text" class="form-control" id="class" name="class" required="True" value="{{ $student->class }}">

                        <div class="modal-footer">
                            <a href="{{ url('students_index') }}" class="btn btn-success rounded-pill">close</a>
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
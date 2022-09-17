@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Teacher') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/teachers_update/'.$teacher->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $teacher->name }}">

                        <label for="contact" class="form-label">contact:</label>
                        <input type="tel" class="form-control" id="contact" name="contact" required="True" value="{{ $teacher->contact }}">

                        <label for="class" class="form-label">class:</label>
                        <input type="text" class="form-control" id="class" name="class" required="True" value="{{ $teacher->class }}">

                        <label for="subjects" class="form-label">subjects:</label>
                        <input type="text" class="form-control" id="subjects" name="subjects" required="True" value="{{ $teacher->subjects }}">

                        <div class="modal-footer">
                            <a href="{{ url('teachers_index') }}" class="btn btn-success rounded-pill">close</a>
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
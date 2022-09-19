@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Class') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/clases_update/'.$clas->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $clas->name }}">

                        <label for="other_details" class="form-label">Other Details:</label>
                        <input type="other_details" class="form-control" id="other_details" name="other_details" required="True" value="{{ $clas->other_details }}">

                        <div class="modal-footer">
                            <a href="{{ url('clases_index') }}" class="btn btn-success rounded-pill">close</a>
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
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Results') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/results_update/'.$result->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $result->name }}">

                        <label for="class" class="form-label">class:</label>
                        <input type="tel" class="form-control" id="class" name="class" required="True" value="{{ $result->class }}">

                        <label for="results" class="form-label">Results:</label>
                        <textarea class="form-control" name="results" id="results" cols="30" rows="1" >{{ $result->results }}</textarea>
                        
                        <label for="position" class="form-label">position:</label>
                        <input type="text" class="form-control" id="position" name="position" required="True" value="{{ $result->position }}">

                        <label for="term_period" class="form-label">term period:</label>
                        <input type="text" class="form-control" id="term_period" name="term_period" required="True" value="{{ $result->term_period }}">

                        <div class="modal-footer">
                            <a href="{{ url('results_index') }}" class="btn btn-success rounded-pill">close</a>
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
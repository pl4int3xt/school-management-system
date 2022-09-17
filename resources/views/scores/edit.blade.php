@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Score') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/scores_update/'.$score->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $score->name }}">

                        <label for="scores" class="form-label">Scores:</label>
                        <input type="text" class="form-control" id="scores" name="scores" required="True" value="{{ $score->scores }}">

                        <label for="term_period" class="form-label">Term period:</label>
                        <input type="text" class="form-control" id="term_period" name="term_period" required="True" value="{{ $score->term_period }}">
                        
                        <div class="modal-footer">
                            <a href="{{ url('scores_index') }}" class="btn btn-success rounded-pill">close</a>
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
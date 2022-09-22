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
                        
                        <label for="name" class="form-label">Class Name:</label>
                        <select id="name" class="form-select" name="name" required="True">

                        @foreach($clases as $clas)
                                <option value="{{ $clas->name }}">{{ $clas->name }}</option>        
                        @endforeach
                                            
                        </select>

                        <label for="scores" class="form-label">scores:</label>
                        <textarea class="form-control" name="scores" id="scores" cols="30" rows="1" >{{ $score->scores }}</textarea>

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
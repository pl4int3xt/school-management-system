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
                    <form action="{{ url('/projects_update/'.$project->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $project->name }}">

                        <label for="cost" class="form-label">Cost:</label>
                        <input type="text" class="form-control" id="cost" name="cost" required="True" value="{{ $project->cost }}">

                        <label for="other_details" class="form-label">Other details:</label>
                        <textarea class="form-control" name="other_details" id="other_details" cols="30" rows="1" value="{{ $project->other_details }}"></textarea>
                        
                        <div class="modal-footer">
                            <a href="{{ url('projects_index') }}" class="btn btn-success rounded-pill">close</a>
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
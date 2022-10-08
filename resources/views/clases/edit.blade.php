@extends('layouts.home')

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

                        <label for="other_details" class="form-label">Other details:</label>
                        <textarea class="form-control" name="other_details" id="other_details" cols="30" rows="1">{{ $clas->other_details }}
                        </textarea>

                        <br>
                        <div class="modal-footer">
                            <div class="container">
                                <a href="{{ url('clases_index') }}" class="btn btn-outline-primary rounded-pill">
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
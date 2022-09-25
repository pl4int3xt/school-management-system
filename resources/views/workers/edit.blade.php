@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Worker') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/workers_update/'.$worker->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $worker->name }}">

                        <label for="contact" class="form-label">contact:</label>
                        <input type="tel" class="form-control" id="contact" name="contact" required="True" value="{{ $worker->contact }}">

                        <label for="area_of_work" class="form-label">Area of work:</label>
                        <input type="text" class="form-control" id="area_of_work" name="area_of_work" required="True" value="{{ $worker->area_of_work }}">

                        <label for="salary" class="form-label">salary:</label>
                        <input type="text" class="form-control" id="salary" name="salary" required="True" value="{{ $worker->salary }}">

                        <br>
                        <div class="modal-footer">
                            <div class="container">
                                <a href="{{ url('workers_index') }}" class="btn btn-outline-primary rounded-pill">
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
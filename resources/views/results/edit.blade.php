@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Store Results') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('results.store') }}" method="post">
                        @csrf
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $student->name }}">

                        <label for="class" class="form-label">class:</label>
                        <input type="tel" class="form-control" id="class" name="class" required="True" value="{{ $student->class }}">
                        
                        <label for="term_period" class="form-label">term period:</label>
                        <input type="text" class="form-control" id="term_period" name="term_period" required="True">

                        @foreach($subjects as $subject)
                            <label for="results" class="form-label">{{ $subject->name }}</label>
                            <input type="" class="form-control" id="results" name="results[]">
                        @endforeach
                        
                        <br>
                        <div class="modal-footer">
                            <div class="container">
                                <a href="{{ url('results_index') }}" class="btn btn-outline-primary rounded-pill">
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
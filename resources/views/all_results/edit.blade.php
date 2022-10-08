@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Edit Results') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('all_results.store') }}" method="post">
                        @csrf
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $result->name }}">

                        <label for="class" class="form-label">class:</label>
                        <input type="tel" class="form-control" id="class" name="class" required="True" value="{{ $result->class }}">
                        
                        <label for="term_period" class="form-label">term period:</label>
                        <input type="text" class="form-control" id="term_period" name="term_period" required="True" value="{{ $result->term_period }}">

                        @foreach($subjects as $subject)
                            <label for="results" class="form-label">{{ $subject->name }}</label>
                            <input type="text" class="form-control" id="results" name="results[]">
                        @endforeach
                        <br>
                        <div class="modal-footer">
                            <div class="container">
                                <a href="{{ url('all_results_index') }}" class="btn btn-outline-primary rounded-pill">
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
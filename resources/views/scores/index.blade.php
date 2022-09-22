@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('Class Scores') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- search form -->
                    <div class="container m-4">
                            <div class="row">
                                <div class="col-8">
                                    <div class="container text-start">
                                        <a href="#" class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#score-reg-modal">Add</a>
                                    </div>
                                </div>
                                <div class="col text-end">
                                    <form action="{{ route('scores.search') }}" method="get">
                                        <input class="form-control" type="text" name="search" placeholder="search here ....."><br>
                                        <button type="submit" class="btn btn-success rounded-pill">Search</button> 
                                    </form>
                                </div>
                            </div>   
                    </div>

                    <div class="container p-0">
                        @if (session('mssg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mssg') }}
                            </div>
                        @endif

                        <!-- members registration table -->
                        <div class="container table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Scores</th>
                                        <th>Term period</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scores as $score) 
                                        <tr>
                                            <td>{{ $score->name }}</td>
                                            <td>{!! str_replace("," ,"<br/>", $score->scores ) !!}</td>
                                            <td>{{ $score->term_period }}</td>
                                            <td>
                                                <a href="{{ url('/scores_edit/'.$score->id) }}" class="btn btn-success rounded-pill">Edit</a>
                                                <a href="{{ url('/scores_destroy/'.$score->id)}}"class="btn btn-danger rounded-pill">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $scores->onEachSide(1)->links() }}
                        </div>
                        <!-- registration modal -->

                        <div class="modal fade" id="score-reg-modal" aria-labelledby="modal-title" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Scores</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('scores.store') }}" method="post">
                                            @csrf
                                            <label for="name" class="form-label">Class Name:</label>
                                            <select id="name" class="form-select" name="name" required="True">

                                            @foreach($clases as $clas)
                                                    <option value="{{ $clas->name }}">{{ $clas->name }}</option>        
                                            @endforeach
                                            
                                            </select>

                                            <label for="scores" class="form-label">Scores:</label>
                                            <textarea class="form-control" name="scores" id="scores" cols="30" rows="1" ></textarea>

                                            <label for="term_period" class="form-label">Term period:</label>
                                            <input type="text" class="form-control" id="term_period" name="term_period" required="True">

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success rounded-pill">
                                                    Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
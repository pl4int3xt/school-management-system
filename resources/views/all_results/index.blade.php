@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('All results') }}</div>

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
        
                                </div>
                                <div class="col text-end">
                                    <form action="{{ route('all_results.search') }}" method="get">
                                        <input class="form-control" type="text" name="search" placeholder="Enter term period ..... "><br>
                                        <button type="submit" class="btn btn-outline-primary rounded-pill">
                                            <i class="fa-solid fa-search"></i>
                                        </button> 
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

                        <div class="container table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Position</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Term Period</th>
                                        @foreach($subjects as $subject)
                                            <th>{{ $subject->name }}</th>
                                        @endforeach
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($results as $result)
                                        @foreach($teachers as $teacher)
                                            @if( Auth::user()->name == $teacher->name && $teacher->class == $result->class)
                                                <tr>
                                                    <td>position</td>
                                                    <td>{{ $result->name }}</td>
                                                    <td>{{ $result->class }}</td>
                                                    <td>{{ $result->term_period }}</td>
                                                    @foreach($result->results as $res)
                                                        <td>{{ $res }}</td>
                                                    @endforeach
                                                    
                                                    <td>
                                                        <a href="{{ url('/all_results_destroy/'.$result->id) }}" class="btn btn-outline-primary rounded-pill">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $results->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
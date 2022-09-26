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
                        @foreach($results as $result)
                            @foreach($teachers as $teacher)
                                @if( Auth::user()->name == $teacher->name && $teacher->class == $result->class)
                            <form action="{{ url('/all_results_update/'.$result->id) }}" method="post">
                                @csrf
                                @method("put")
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
                                            <th>Total subjects</th>
                                            <th>Total</th>
                                            <th>Average</th>
                                            <th>Grade</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                                    <tr>
                                                        <td><input class="form-control" type="text" name="position" value="{{ $result->position }}"></td>
                                                        <td>{{ $result->name }}</td>
                                                        <td>{{ $result->class }}</td>
                                                        <td>{{ $result->term_period }}</td>
                                                        @foreach($result->results as $res)
                                                            <td>{{ $res }}</td>
                                                        @endforeach
                                                        <td>{{ $result->total_subjects }}</td>
                                                        <td>{{ $result->total }}</td>
                                                        <td>{{ $result->average }}</td>
                                                        <td>{{ $result->grade }}</td>
                                                        <td>
                                                            <a href="{{ url('/all_results_destroy/'.$result->id) }}" class="btn btn-outline-primary rounded-pill">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </a>
                                                            <button type="submit" class="btn btn-outline-primary rounded-pill">
                                                                <i class="fa-solid fa-paper-plane"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                
                                    </tbody>
                                </table>
                                {{ $results->onEachSide(1)->links() }}
                            </form>
                                @endif
                            @endforeach
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
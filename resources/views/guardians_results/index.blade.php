@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('Results') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- search form -->
                    <!-- <div class="container m-4">
                            <div class="row">
                                <div class="col text-end">
                                    <form action="{{ route('guardians_results.search') }}" method="get">
                                        <input class="form-control" type="text" name="search" placeholder="search here ....."><br>
                                        <button type="submit" class="btn btn-success rounded-pill">Search</button> 
                                    </form>
                                </div>
                            </div>   
                    </div> -->

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
                                        <th>Class</th>
                                        <th>results</th>
                                        <th>term period</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($results as $result)
                                        @foreach ($students as $student)
                                            @if(Auth::user()->name == $student->parent && $student->name == $result->name) 
                                                <tr>
                                                    <td>{{ $result->name }}</td>
                                                    <td>{{ $result->class }}</td>
                                                    <td>{{ $result->results }}</td>
                                                    <td>{{ $result->term_period }}</td>
                                                    <td>
                                                        <a href="{{ url('/results_reports_index/'.$result->id) }}" class="btn btn-success rounded-pill">Details</a>
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
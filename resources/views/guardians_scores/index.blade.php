@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('Class Scores') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- search form -->
                    <!-- <div class="container m-4">
                        <div class="col text-end">
                            <form action="{{ route('guardians_scores.search') }}" method="get">
                                <input class="form-control" type="text" name="search" placeholder="search here ....."><br>
                                <button type="submit" class="btn btn-success rounded-pill">Search</button> 
                            </form>
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
                                        <th>Scores</th>
                                        <th>Term period</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scores as $score) 
                                        <tr>
                                            <td>{{ $score->name }}</td>
                                            <td>{{ $score->scores }}</td>
                                            <td>{{ $score->term_period }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $scores->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
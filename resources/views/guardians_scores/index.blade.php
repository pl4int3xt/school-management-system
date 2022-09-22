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
                                        <th>Name</th>
                                        <th>Scores</th>
                                        <th>Term period</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scores as $score) 
                                        <tr>
                                            <td>{{ $score->name }}</td>
                                            <td>{!! str_replace("," ,"<br/>", $score->scores ) !!}</td>
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
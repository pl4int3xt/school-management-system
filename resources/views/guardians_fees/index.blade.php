@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('Fees') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- search form -->
                    <!-- <div class="container m-4">
                                <div class="col text-end">
                                    <form action="{{ route('guardians_fees.search') }}" method="get">
                                        <input class="form-control" type="text" name="search" placeholder="search here ....."><br>
                                        <button type="submit" class="btn btn-success rounded-pill">Search</button> 
                                    </form>
                                </div>   
                    </div> -->

                    <div class="container p-0">
                        <div class="container table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Fee paid</th>
                                        <th>Fee payable</th>
                                        <th>Fee balance</th>
                                        <th>Payment method</th>
                                        <th>Ref no</th>
                                        <th>Term period</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fees as $fee) 
                                        @foreach ($students as $student)
                                            @if(Auth::user()->name == $student->parent && $student->name == $fee->name)
                                                <tr>
                                                    <td>{{ $fee->name }}</td>
                                                    <td>{{ $fee->fee_paid }}</td>
                                                    <td>{{ $fee->fee_payable }}</td>
                                                    <td>{{ ($fee->fee_payable) - ($fee->fee_paid)}}</td>
                                                    <td>{{ $fee->payment_method }}</td>
                                                    <td>{{ $fee->ref_no }}</td>
                                                    <td>{{ $fee->term_period }}</td>
                                                    <td>
                                                        <a href="{{ url('/fees_reports_pdf/'.$fee->id)}}"class="btn btn-success rounded-pill">Download</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $fees->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
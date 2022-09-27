@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('All Fees') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <!-- search form -->
                   <div class="container m-4">
                        <div class="row">
                            <div class="col text-end">
                                <form action="{{ route('all_fees.search') }}" method="get">
                                    <input class="form-control" type="text" name="search" placeholder="search here ....."><br>
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

                        <!-- users registration table -->
                        <div class="container table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Fee paid</th>
                                        <th>Fee payable</th>
                                        <th>Payment method</th>
                                        <th>Ref No</th>
                                        <th>Term period</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fees as $fee) 
                                        <tr>
                                            <td>{{ $fee->name }}</td>
                                            <td>{{ $fee->fee_paid }}</td>
                                            <td>{{ $fee->fee_payable }}</td>
                                            <td>{{ $fee->payment_method }}</td>
                                            <td>{{ $fee->ref_no }}</td>
                                            <td>{{ $fee->term_period }}</td>
                                            <td>
                                                <a href="{{ url('/all_fees_destroy/'.$fee->id)}}"class="btn btn-outline-primary rounded-pill">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
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

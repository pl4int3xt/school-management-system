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
                    <div class="container m-4">
                            <div class="row">
                                <div class="col-8">
                                    <div class="container text-start">
                                        <a href="#" class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#fee-reg-modal">Add</a>
                                    </div>
                                </div>
                                <div class="col text-end">
                                    <form action="{{ route('fees.search') }}" method="get">
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
                                        <th>Fee paid</th>
                                        <th>Fee payable</th>
                                        <th>Fee balance</th>
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
                                            <td>{{ ($fee->fee_payable) - ($fee->fee_paid)}}</td>
                                            <td>{{ $fee->payment_method }}</td>
                                            <td>{{ $fee->ref_no }}</td>
                                            <td>{{ $fee->term_period }}</td>
                                            <td>
                                                <a href="{{ url('/fees_edit/'.$fee->id) }}" class="btn btn-success rounded-pill">Edit</a>
                                                <a href="{{ url('/fees_destroy/'.$fee->id)}}"class="btn btn-danger rounded-pill">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $fees->onEachSide(1)->links() }}
                        </div>
                        <!-- registration modal -->

                        <div class="modal fade" id="fee-reg-modal" aria-labelledby="modal-title" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Fee submission</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('fees.store') }}" method="post">
                                            @csrf
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" required="True">

                                            <label for="fee_paid" class="form-label">Fee paid:</label>
                                            <input type="tel" class="form-control" id="fee_paid" name="fee_paid" required="True">

                                            <label for="fee_payable" class="form-label">Fee payable:</label>
                                            <input type="text" class="form-control" id="fee_payable" name="fee_payable" required="True">

                                            <label for="payment_method" class="form-label">Payment method:</label>
                                            <input type="text" class="form-control" id="payment_method" name="payment_method" required="True">

                                            <label for="ref_no" class="form-label">Ref No:</label>
                                            <input type="text" class="form-control" id="ref_no" name="ref_no" required="True">
                                            
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
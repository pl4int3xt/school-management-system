@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Edit Fees') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/all_fees_update/'.$fee->id) }}" method="post">
                        @csrf
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $fee->name }}">

                        <label for="fee_paid" class="form-label">Fee Paid:</label>
                        <input type="text" class="form-control" id="fee_paid" name="fee_paid" required="True" value="{{ $fee->fee_paid }}">
                        
                        <label for="fee_payable" class="form-label">Fee Payable:</label>
                        <input type="text" class="form-control" id="fee_payable" name="fee_payable" required="True" value="{{ $fee->fee_payable }}">

                        <label for="payment_method" class="form-label">Payment Method:</label>
                        <input type="text" class="form-control" id="payment_method" name="payment_method" required="True" value="{{ $fee->payment_method }}">

                        <label for="ref_no" class="form-label">Ref No:</label>
                        <input type="text" class="form-control" id="ref_no" name="ref_no" required="True" value="{{ $fee->ref_no }}">

                        <label for="term_period" class="form-label">Term Period:</label>
                        <input type="text" class="form-control" id="term_period" name="term_period" required="True" value="{{ $fee->term_period }}">

                        <br>
                        <div class="modal-footer">
                            <div class="container">
                                <a href="{{ url('all_fees_index') }}" class="btn btn-outline-primary rounded-pill">
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
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Fees') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/fees_update/'.$fee->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $fee->name }}">

                        <label for="fee_paid" class="form-label">Fee paid:</label>
                        <input type="tel" class="form-control" id="fee_paid" name="fee_paid" required="True" value="{{ $fee->fee_paid }}">

                        <label for="fee_payable" class="form-label">Fee payable:</label>
                        <input type="text" class="form-control" id="fee_payable" name="fee_payable" required="True" value="{{ $fee->fee_payable }}">

                        <label for="payment_method" class="form-label">Payment method:</label>
                        <input type="text" class="form-control" id="payment_method" name="payment_method" required="True" value="{{ $fee->payment_method }}">

                        <label for="ref_no" class="form-label">Ref No:</label>
                        <input type="text" class="form-control" id="ref_no" name="ref_no" required="True" value="{{ $fee->ref_no }}">

                        <label for="term_period" class="form-label">Term period:</label>
                        <input type="text" class="form-control" id="term_period" name="term_period" required="True" value="{{ $fee->term_period }}">

                        <div class="modal-footer">
                            <a href="{{ url('fees_index') }}" class="btn btn-success rounded-pill">close</a>
                            <button type="submit" class="btn btn-success rounded-pill">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
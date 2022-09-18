<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>School management system</title>

    <!-- Scripts -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- jquery script -->
</head>
<body>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="result" class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="text-uppercase text-center mt-3" style="font-size: 30px;">School Name</h3>
                        <h3 class="text-uppercase text-center mt-3" style="font-size: 30px;">Fee Slip</h3></br>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <h4>Name</h4>
                                </div>
                                <div class="col">
                                    <h4>{{ $fees_report->name }}</h4>
                                </div>
                                <hr>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col">
                                    <h4>Fee Paid</h4>
                                </div>
                                <div class="col">
                                    <h4>{{ $fees_report->fee_paid }}</h4>
                                </div>
                                <hr>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col">
                                    <h4>Fee payable</h4>
                                </div>
                                <div class="col">
                                    <h4>{{ $fees_report->fee_payable }}</h4>
                                </div>
                                <hr>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col">
                                    <h4>Fee balance</h4>
                                </div>
                                <div class="col">
                                    <h4>{{ ($fees_report->fee_payable) - ($fees_report->fee_paid)}}</h4>
                                </div>
                                <hr>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col">
                                    <h4>Payment Method</h4>
                                </div>
                                <div class="col">
                                    <h4>{{ $fees_report->payment_method }}</h4>
                                </div>
                                <hr>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col">
                                    <h4>Ref No</h4>
                                </div>
                                <div class="col">
                                    <h4>{{ $fees_report->ref_no }}</h4>
                                </div>
                                <hr>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col">
                                    <h4>Term Period</h4>
                                </div>
                                <div class="col">
                                    <h4>{{ $fees_report->term_period }}</h4>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
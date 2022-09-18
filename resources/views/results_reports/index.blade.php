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
                            <h3 class="text-uppercase text-center mt-3" style="font-size: 30px;">Result Slip</h3></br>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <h4>Name</h4>
                                    </div>
                                    <div class="col">
                                        <h4>{{ $results_report->name }}</h4>
                                    </div>
                                    <hr>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col">
                                        <h4>Class</h4>
                                    </div>
                                    <div class="col">
                                        <h4>{{ $results_report->class }}</h4>
                                    </div>
                                    <hr>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <h4>Results</h4>
                                    </div>
                                    <div class="col">
                                        <h4>{{ $results_report->results }}</h4>
                                    </div>
                                    <hr>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col">
                                        <h4>Position</h4>
                                    </div>
                                    <div class="col">
                                        <h4>{{ $results_report->position }}</h4>
                                    </div>
                                    <hr>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col">
                                        <h4>Term period</h4>
                                    </div>
                                    <div class="col">
                                        <h4>{{ $results_report->term_period }}</h4>
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

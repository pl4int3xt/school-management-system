@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Store Results') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('results.store') }}" method="post">
                        @csrf
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $student->name }}">

                        <label for="class" class="form-label">class:</label>
                        <input type="tel" class="form-control" id="class" name="class" required="True" value="{{ $student->class }}">
                        
                        <label for="term_period" class="form-label">term period:</label>
                        <input type="text" class="form-control" id="term_period" name="term_period" required="True">

                        @foreach($subjects as $subject)
                            <label for="results" class="form-label">{{ $subject->name }}</label>
                            <input type="" class="form-control" id="results" name="results[]">
                        @endforeach

                        <label for="total" class="form-label">Total:</label>
                        <input type="text" class="form-control" id="total" name="total" required="True">
                        
                        <label for="total_subjects" class="form-label">Total subjects:</label>
                        <input type="text" class="form-control" id="total_subjects" name="total_subjects" required="True">

                        <label for="average" class="form-label">Average:</label>
                        <input type="text" class="form-control" id="average" name="average" required="True">

                        <label for="grade" class="form-label">Grade:</label>
                        <input type="text" class="form-control" id="grade" name="grade" required="True">

                        <script type="text/javascript">
                            function calculate(){
                                var total = 0
                                
                                var results = document.getElementsByName('results[]')
                                var total_subjects = document.getElementById('total_subjects').value

                                for(var i = 0; i < results.length; i++){

                                    results[i].value = results[i].value || 0
                                    total += parseInt(results[i].value)
                                }
                                
                                var average = total / parseInt(total_subjects)

                                if(average >= 75 && average <=100){
                                    document.getElementById('grade').setAttribute('value','A');
                                } else if(average >= 70 && average < 75){
                                    document.getElementById('grade').setAttribute('value','B+');
                                }else if(average >= 65 && average < 70){
                                    document.getElementById('grade').setAttribute('value','B');
                                }else if(average >= 60 && average < 65){
                                    document.getElementById('grade').setAttribute('value','B-');
                                }else if(average >= 55 && average < 60){
                                    document.getElementById('grade').setAttribute('value','c+');
                                }else if(average >= 50 && average < 55){
                                    document.getElementById('grade').setAttribute('value','c');
                                }else if(average >= 45 && average < 50){
                                    document.getElementById('grade').setAttribute('value','c-');
                                }else if(average >= 40 && average < 45){
                                    document.getElementById('grade').setAttribute('value','D+');
                                }else if(average >= 35 && average < 40){
                                    document.getElementById('grade').setAttribute('value','D');
                                }else if(average >= 30 && average < 35){
                                    document.getElementById('grade').setAttribute('value','D-');
                                }else if(average >= 0 && average < 30){
                                    document.getElementById('grade').setAttribute('value','E');
                                }else {
                                    document.getElementById('grade').setAttribute('value','F');
                                }

                                document.getElementById('total').setAttribute('value',total)
                                document.getElementById('average').setAttribute('value',average)
                            }
                        </script>
                        <br>
                            <div class="container">
                                <a class="btn btn-outline-primary rounded-pill" onclick="calculate()">
                                    <i class="fa-solid fa-add"></i>
                                </a>
                            </div>
                        <br>
                        <div class="modal-footer">
                            <div class="container">
                                <a href="{{ url('results_index') }}" class="btn btn-outline-primary rounded-pill">
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
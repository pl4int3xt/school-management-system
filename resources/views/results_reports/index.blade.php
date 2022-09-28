<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <style>
        h1{
            text-align: center;
        }

        table, td{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
            width: 100%;
        }
        

    </style>

    <h1>School Name</h1>
    <h1>Results Slip</h1>
    <h1>Student Name: {{ $results_report->name }}</h1>
    <h1>Class: {{ $results_report->class }}</h1>
    <h1>Term Period: {{ $results_report->term_period }}</h1>
    
    <table>
        <tr>
            @foreach($subjects as $subject)
                <td>{{ $subject->name }}</td>
            @endforeach
        </tr>
        <tr>
            @foreach($results_report->results as $res)    
                <td>{{ $res }}</td>
            @endforeach
        </tr>
        <tr>
            @foreach($results_report->results as $res)
                @if($res >=75 && $res < 101)    
                    <td>A</td>
                @elseif($res >=70 && $res < 75)
                    <td>B+</td>
                @elseif($res >=65 && $res < 70)
                    <td>B</td>
                @elseif($res >=60 && $res < 65)
                    <td>B-</td>
                @elseif($res >= 55 && $res < 60)
                    <td>C+</td>
                @elseif($res >=50 && $res < 55)
                    <td>C</td>
                @elseif($res >=45 && $res < 50)
                    <td>C-</td>
                @elseif($res >=40 && $res < 45)
                    <td>D+</td>
                @elseif($res >=35 && $res < 40)
                    <td>D</td>
                @elseif($res >=30 && $res < 35)
                    <td>D-</td>
                @elseif($res >0 && $res < 30)
                    <td>E</td>
                @else
                    <td>Not Applicable</td>
                @endif
            @endforeach
        </tr>
    </table>
    <table>
        <tr>
            <td>Position</td>
            <td>{{ $results_report->position }}</td>
        </tr>
        <tr>
            <td>Total subjects</td>
            <td>{{ $results_report->total_subjects }}</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>{{ $results_report->total }}</td>
        </tr>
        <tr>
            <td>Average</td>
            <td>{{ $results_report->average }}</td>
        </tr>
        <tr>
            <td>Grade</td>
            <td>{{ $results_report->grade }}</td>
        </tr>
    </table>
</body>
</html>
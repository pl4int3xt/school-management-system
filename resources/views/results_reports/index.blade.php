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
        }
        table{
            text-align: left;
            width: 100%;
        }
        tr:nth-child(even){
            background-color: grey;
        }

    </style>

    <h1>School Name</h1>
    <h1>Results Slip</h1>
    <h1>Student Name: {{ $results_report->name }}</h1>

    <table>
        <tr>
            <td>Class</td>
            <td>{{ $results_report->class }}</td>
        </tr>
        <tr>
            <td>Total subjects</td>
            <td>{{ $results_report->total_subjects }}</td>
        </tr>
        <tr>
            <td>Term Period</td>
            <td>{{ $results_report->term_period }}</td>
        </tr>
    </table>
    
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
    </table>
    <table>
        <tr>
            <td>Position</td>
            <td>{{ $results_report->position }}</td>
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
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

    <table>
        <tr>
            <td>Name</td>
            <td>{{ $results_report->name }}</td>
        </tr>
        <tr>
            <td>Class</td>
            <td>{{ $results_report->class }}</td>
        </tr>
        <tr>
            <td>Results</td>
            <td>{!! str_replace("," ,"<br/>", $results_report->results ) !!}</td>
        </tr>
        <tr>
            <td>Term Period</td>
            <td>{{ $results_report->term_period }}</td>
        </tr>
    </table>
</body>
</html>
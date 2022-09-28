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
    <h1>Fee Statement</h1>

    <h1>Student Name: {{ $fees_report->name }} </h1>
    <table>
        <tr>
            <td>Fee Paid</td>
            <td>{{ $fees_report->fee_paid }}</td>
        </tr>
        <tr>
            <td>Fee payable</td>
            <td>{{ $fees_report->fee_payable }}</td>
        </tr>
        <tr>
            <td>Fee Balance</td>
            <td>{{ ($fees_report->fee_payable) - ($fees_report->fee_paid)}}</td>
        </tr>
        <tr>
            <td>Payment method</td>
            <td>{{ $fees_report->payment_method }}</td>
        </tr>
        <tr>
            <td>Ref No</td>
            <td>{{ $fees_report->ref_no }}</td>
        </tr>
        <tr>
            <td>Term period</td>
            <td>{{ $fees_report->term_period }}</td>
        </tr>
    </table>
</body>
</html>
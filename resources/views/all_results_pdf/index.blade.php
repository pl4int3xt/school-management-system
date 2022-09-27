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

        table, td, th{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
        table{
            text-align: left;
            width: 100%;
        }

    </style>
    <table>
        <thead>
            <tr>
                <th>Position</th>
                <th>Name</th>
                @foreach($subjects as $subject)
                    <th>{{ $subject->name }}</th>
                @endforeach
                <th>Total</th>
                <th>Average</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
                @foreach($teachers as $teacher)
                    @if( Auth::user()->name == $teacher->name && $result->class == $teacher->class)
                        <tr>
                            <td>{{ $result->position }}</td>
                            <td>{{ $result->name }}</td>
                            @foreach($result->results as $res)
                                <td>{{ $res }}</td>
                            @endforeach
                            <td>{{ $result->total }}</td>
                            <td>{{ $result->average }}</td>
                            <td>{{ $result->grade }}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>    
    </table>
</body>
</html>
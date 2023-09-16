<!DOCTYPE html>
<html>
<head>
    <title>Trainings Report</title>
    
       
       <style>
        table {
         width: 100%;
         border-collapse: collapse;
     }
     th, td {
         border: 1px solid black;
         padding: 8px;
         text-align: left;
     }
 </style>
    
</head>
<body>
    <h1>Trainings Report</h1>
    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Price</th>
                <th>Trainer</th>
                <th>Employees</th>
                <th>Status</th>
                <th>Number of Employees</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trainings as $training)
            <tr>
                <td>{{ $training->trainingType->title }}</td>
                  <td>{{ $training->trainingType->start_date }}</td>
                <td>{{ $training->trainingType->end_date }}</td>
                <td>{{ $training->trainingType->price }}</td>
                <td>{{ $training->trainer->employee->Firstname }}</td>
                <td>
                    @foreach($training->employees as $employee)
                        {{ $employee->Firstname }},
                    @endforeach
                </td>
                <td>{{ $training->status }}</td>
                <td>{{ $training->num_of_employees }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

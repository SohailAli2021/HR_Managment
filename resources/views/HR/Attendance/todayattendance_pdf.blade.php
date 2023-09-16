<!DOCTYPE html>
<html>
<head>
    <title> Today's Attendance Report</title>
    
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
    <h1> Today's Attendance Report</h1>
    <table>
        <thead>
            <tr>
                <th>Employee</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendance as $entry)
            <tr>
                <td>{{ $entry->employee->Firstname }}</td>
                <td>{{ $entry->date }}</td>
                <td>{{ $entry->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

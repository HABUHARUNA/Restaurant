<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>BawaFood</title>
</head>
<body>
    <table>
        <tbody>
            <div class="alert alert-success"><tr><td>Status: </td><td>{{$data->status}}</td></tr></div>
            <tr><td>Refrence: </td><td>{{$data->reference}}</td></tr>
            <tr><td>Amount: </td><td>{{$data->amount}}</td></tr>
            <tr><td>Fees: </td><td>{{$data->fees}}</td></tr>
            <tr><td>Email: </td><td>{{$data->customer->email}}</td></tr>
        </tbody>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Create New Order</a>


    <h1>Order List</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Event ID</th>
            <th>Event Date</th>
            <th>Adult Ticket Price</th>
            <th>Adult Ticket Quantity</th>
            <th>Kid Ticket Price</th>
            <th>Kid Ticket Quantity</th>
            <th>Barcode</th>
            <th>Total Price</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->event_id }}</td>
                <td>{{ $order->event_date }}</td>
                <td>{{ $order->ticket_adult_price }}</td>
                <td>{{ $order->ticket_adult_quantity }}</td>
                <td>{{ $order->ticket_kid_price }}</td>
                <td>{{ $order->ticket_kid_quantity }}</td>
                <td>{{ $order->barcode }}</td>
                <td>{{ $order->equal_price }}</td>
                <td>{{ $order->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

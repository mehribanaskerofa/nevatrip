<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Order List</h1>

    @if(session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ url('/orders/create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded">Create Order</a>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
        <tr>
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Event ID</th>
            <th class="py-2 px-4 border-b">Ticket Type ID</th>
            <th class="py-2 px-4 border-b">Quantity</th>
            <th class="py-2 px-4 border-b">Price</th>
            <th class="py-2 px-4 border-b">Barcode</th>
            <th class="py-2 px-4 border-b">Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td class="py-2 px-4 border-b">{{ $order->id }}</td>
                <td class="py-2 px-4 border-b">{{ $order->event_id }}</td>
                <td class="py-2 px-4 border-b">{{ $order->ticket_type_id }}</td>
                <td class="py-2 px-4 border-b">{{ $order->quantity }}</td>
                <td class="py-2 px-4 border-b">{{ $order->price }}</td>
                <td class="py-2 px-4 border-b">{{ $order->barcode }}</td>
                <td class="py-2 px-4 border-b">{{ $order->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>

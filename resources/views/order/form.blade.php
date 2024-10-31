<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Create Order</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/order') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="event_id" class="block text-gray-700">Event</label>
            <select name="event_id" id="event_id" required class="mt-1 block w-full border border-gray-300 rounded p-2">
                <option value="">Select an Event</option>
                @foreach ($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="ticket_type_id" class="block text-gray-700">Ticket Type</label>
            <select name="ticket_type_id" id="ticket_type_id" required class="mt-1 block w-full border border-gray-300 rounded p-2">
                <option value="">Select a Ticket Type</option>
                @foreach ($ticketTypes as $ticketType)
                    <option value="{{ $ticketType->id }}">{{ $ticketType->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700">Quantity</label>
            <input type="number" name="quantity" id="quantity" required class="mt-1 block w-full border border-gray-300 rounded p-2" />
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700">Price</label>
            <input type="number" name="price" id="price" required class="mt-1 block w-full border border-gray-300 rounded p-2" />
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Create Order</button>
    </form>

    <a href="{{ url('/orders') }}" class="inline-block mt-4 text-blue-600">Back to Order List</a>
</div>

</body>
</html>

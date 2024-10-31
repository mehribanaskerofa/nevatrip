<!-- resources/views/orders/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Create a New Order</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="event_id" class="form-label">Event</label>
            <select class="form-control" id="event_id" name="event_id" >
                <option value="">Select an Event</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}" {{ old('event_id') == $event->id ? 'selected' : '' }}>
                        {{ $event->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="event_date" class="form-label">Event Date</label>
            <input type="date" class="form-control" id="event_date" name="event_date" value="{{ old('event_date') }}" required>
        </div>
        <div class="mb-3">
            <label for="ticket_adult_price" class="form-label">Adult Ticket Price</label>
            <input type="number" class="form-control" id="ticket_adult_price" name="ticket_adult_price" value="{{ old('ticket_adult_price') }}" required>
        </div>
        <div class="mb-3">
            <label for="ticket_adult_quantity" class="form-label">Adult Ticket Quantity</label>
            <input type="number" class="form-control" id="ticket_adult_quantity" name="ticket_adult_quantity" value="{{ old('ticket_adult_quantity') }}" required>
        </div>
        <div class="mb-3">
            <label for="ticket_kid_price" class="form-label">Kid Ticket Price</label>
            <input type="number" class="form-control" id="ticket_kid_price" name="ticket_kid_price" value="{{ old('ticket_kid_price') }}" required>
        </div>
        <div class="mb-3">
            <label for="ticket_kid_quantity" class="form-label">Kid Ticket Quantity</label>
            <input type="number" class="form-control" id="ticket_kid_quantity" name="ticket_kid_quantity" value="{{ old('ticket_kid_quantity') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Order</button>
    </form>
</div>
</body>
</html>

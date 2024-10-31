<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class FakeApiController extends Controller
{
    public function book(Request $request)
    {
        $barcode = $request->input('barcode');

        if ($barcode === 'BC1234567890') {
            return response()->json(['error' => 'Barcode already exists'], 400);
        }

        $order = Order::create([
            'event_id' => $request->event_id, // Assuming these fields are sent in the request
            'created' => now(), // or any date you want
        ]);
        return response()->json([
            'message' => 'Order successfully booked',
            'order_id' => $order->id// Return the generated order ID
        ], 200);
    }

    public function approve(Request $request)
    {
        // Get the barcode from the request
        $barcode = $request->input('barcode');

        if ($barcode != '123456') { // Example barcode
            return response()->json(['message' => 'Order successfully approved'], 200);
        } else {
            // Simulate an error response for other barcodes
            return response()->json(['message' => 'Invalid barcode provided'], 400);
        }
    }
}

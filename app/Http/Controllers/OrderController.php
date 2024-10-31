<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\OrderTicket;
use App\Services\OrderService;
use App\Models\Order;
use App\Models\TicketType;
use App\Models\Event;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    private $API_ENDPOINT = 'http://localhost:8001/api/';

    public function index()
    {
        $orders = OrderTicket::with(['ticketType', 'order.event'])->get(); // Load related models
        return view('order.index', compact('orders'));
    }

    // Show the order creation form
    public function create()
    {
        $events = Event::all();
        $ticketTypes = TicketType::all();

        return view('order.form', compact('events', 'ticketTypes'));
    }

    // Create a new order
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        // Generate a unique barcode
        $barcode = OrderTicket::generateBarcode();

        // Send booking request to the external API
        $response = Http::post($this->API_ENDPOINT . 'book', [
            'barcode' => $barcode,
            'event_id' => $request->event_id,
            'ticket_type_id' => $request->ticket_type_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        $orderId = $response->json('order_id');

        // Check for errors in the booking response
        if ($response->failed() || $response->json('error')) {
            return redirect()->back()->withErrors(['barcode' => 'Could not book the order.']);
        }

        // Send confirmation request to the external API
        $confirmationResponse = Http::post($this->API_ENDPOINT . 'approve', [
            'barcode' => $barcode,
        ]);

        if ($confirmationResponse->failed() || $confirmationResponse->json('error')) {
            return redirect()->back()->withErrors(['confirmation' => 'Could not confirm the order.']);
        }

        // Save the order in the database
        OrderTicket::create([
            'order_id' => $orderId, // Assume the API returns the order ID
            'ticket_type_id' => $request->ticket_type_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'barcode' => $barcode,
        ]);

        return redirect()->route('order.index')->with('success', 'Order created successfully!');
    }

    // Generate a unique barcode
    private function generateUniqueBarcode()
    {
        return mt_rand(1000000000, 9999999999); // Generate a random 10-digit number
    }
}

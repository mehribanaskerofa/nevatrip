<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Http;

class OrderService
{
    public function addOrder($eventId, $ticketTypeId, $quantity, $price)
    {
        // Generate a unique barcode
        $barcode = $this->generateUniqueBarcode();

        // Attempt to book the order with the generated barcode
        $bookingResponse = $this->bookOrder($barcode);

        if (isset($bookingResponse['error'])) {
            // If there's an error, check if it's 'barcode already exists'
            if ($bookingResponse['error'] === 'barcode already exists') {
                // Generate a new barcode and retry booking
                return $this->addOrder($eventId, $ticketTypeId, $quantity, $price);
            }
            return ['error' => $bookingResponse['error']];
        }

        // Once booked, confirm the order
        $approvalResponse = $this->approveOrder($barcode);

        if (isset($approvalResponse['error'])) {
            // Handle various approval errors
            return ['error' => $approvalResponse['error']];
        }

        // Insert order into the database
        DB::table('order_tickets')->insert([
            'order_id' => DB::table('orders')->insertGetId([
                'event_id' => $eventId,
                'created' => now()
            ]), // Create the order and get its ID
            'ticket_type_id' => $ticketTypeId,
            'price' => $price,
            'quantity' => $quantity,
            'barcode' => $barcode,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return ['message' => 'Order successfully created', 'barcode' => $barcode];
    }

    // Function to generate a unique barcode
    private function generateUniqueBarcode()
    {
        do {
            $barcode = strtoupper(Str::random(10)); // Generate a random 10 character string
        } while (DB::table('order_tickets')->where('barcode', $barcode)->exists());

        return $barcode;
    }

    // Mock function to book the order
    private function bookOrder($barcode)
    {
        // Here, you would normally call the external API
        // Simulating API response for demonstration purposes
        $mockResponses = [
            ['message' => 'order successfully booked'],
            ['error' => 'barcode already exists'],
        ];

        return $mockResponses[array_rand($mockResponses)];
    }

    // Mock function to approve the order
    private function approveOrder($barcode)
    {
        // Simulating API response for demonstration purposes
        $mockResponses = [
            ['message' => 'order successfully approved'],
            ['error' => 'event cancelled'],
            ['error' => 'no tickets'],
            ['error' => 'no seats'],
            ['error' => 'fan removed'],
        ];

        return $mockResponses[array_rand($mockResponses)];
    }
}

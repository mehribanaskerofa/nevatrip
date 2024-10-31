<?php

namespace Database\Seeders;

use App\Models\OrderTicket;
use App\Models\TicketType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Order;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
//    public function run()
//    {
//        // Check if there are any events
//        if (Event::count() > 0) {
//            // Get all events
//            $events = Event::all();
//
//            // Create orders for each event
//            foreach ($events as $event) {
//                Order::factory()->count(5)->create([
//                    'event_id' => $event->id, // Associate orders with the current event
//                ]);
//            }
//        } else {
//            // Optionally log a message or handle the case where no events exist
//            \Log::info('No events found. Skipping order creation.');
//        }
//    }
//    public function run()
//    {
//        $orders = [
//            [
//                'event_id' => 1,
//                'created' => now(),
//            ],
//        ];
//
//        foreach ($orders as $orderData) {
//            $order = Order::create($orderData);
//
//            $ticketTypes = TicketType::pluck('id')->toArray();
//
//            foreach ($ticketTypes as $ticketTypeId) {
//                $quantity = rand(1, 5);
//
//                for ($i = 0; $i < $quantity; $i++) {
//                    OrderTicket::create([
//                        'order_id' => $order->id,
//                        'ticket_type_id' => $ticketTypeId,
//                        'price' => 100,
//                        'quantity' => 1,
//                        'barcode' => OrderTicket::generateBarcode(),
//                    ]);
//                }
//            }
//        }
//    }
    public function run()
    {
        // Call other seeders or create orders directly
        Order::factory()->count(10)->create(); // Creates 10 orders
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TicketType;
use App\Models\Order;
use App\Models\OrderTicket;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderTicket>
 */
class OrderTicketFactory extends Factory
{
    protected $model = OrderTicket::class;

    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'ticket_type_id' => TicketType::factory(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'quantity' => $this->faker->numberBetween(1, 5),
            'barcode' => $this->faker->unique()->ean13,
        ];
    }
}

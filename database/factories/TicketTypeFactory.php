<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TicketType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketType>
 */
class TicketTypeFactory extends Factory
{
    protected $model = TicketType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Adult', 'Kid', 'Discounted', 'Group']),
            'description' => $this->faker->sentence(),
        ];
    }
}

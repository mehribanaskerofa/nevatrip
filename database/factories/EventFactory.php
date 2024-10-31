<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3), // Generate a random event name
            'description' => $this->faker->paragraph(), // Generate a random description
            'schedule' => $this->faker->dateTimeBetween('+0 days', '+1 year'), // Random schedule within the next year
        ];
    }
}

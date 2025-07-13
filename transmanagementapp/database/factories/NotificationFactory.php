<?php

namespace Database\Factories;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 9), // sesuaikan dengan data users
            'type' => $this->faker->randomElement(['order', 'payment', 'request']),
            'title' => $this->faker->sentence(3),
            'message' => $this->faker->paragraph(),
            'is_read' => $this->faker->boolean(),
            'read_at' => now()->subDays(rand(0, 5)),
            'created_at' => now(),
        ];
    }
}

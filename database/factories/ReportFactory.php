<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'location' => json_encode([
                'lat' => fake()->latitude(),
                'lng' => fake()->longitude(),
            ]),
            'status' => fake()->randomElement(['open', 'in_progress', 'resolved', 'closed']),
            'user_id' => User::factory(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Quest; // Replace with your quest model path

class QuestFactory extends Factory
{
    /**
     * The name of the factory's definition.
     *
     * @var string
     */
    protected $model = Quest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(5),
			'summary' => $this->faker->paragraph(1),
            'points' => $this->faker->numberBetween(10, 100), // Adjust reward range
            'status' => $this->faker->randomElement(['open', 'in_progress', 'completed']), // Example quest statuses
			'repeatability_text' => $this->faker->paragraph(1),
			'fine_print' => $this->faker->paragraph(1),
			'turn_in_text' => $this->faker->paragraph(1),
			'min_level' => $this->faker->numberBetween(1, 5);
            'created_at' => $this->faker->dateTimeThisMonth(),
            'updated_at' => $this->faker->dateTimeThisMonth(),
        ];
    }

    public function active()
    {
        return $this->state([
            'status' => 'open',
        ]);
    }

    public function completed()
    {
        return $this->state([
            'status' => 'completed',
        ]);
    }

    // You can add more states here for different quest types or statuses
}
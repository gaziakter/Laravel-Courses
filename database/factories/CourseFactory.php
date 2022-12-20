<?php

namespace Database\Factories;

use App\Models\Platform;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name' => fake()->words(nb: 5),
            'book' => rand(0, 1),
            'price' => rand(0, 1)? rand(1, 100): null,
            'image' => fake()->imageUrl(),
            'description' => fake()->paragraph(nb: 3),
            'link' => fake()->url(),
            'submitted_by' => User::all()->random()->id,
            'duration' => rand(0, 2),
            'platform_id' => Platform::all()->random()->id,

        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::all();
        return [
            'user_id' => $user->random()->id,
            'book_title' => $this->faker->word(),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'review_title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(5),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::all();
        $review = Review::all();
        return [
            'review_id' => $review->random()->id,
            'user_id' => $user->random()->id,
            'comment' => $this->faker->paragraph(2),
        ];
    }
}

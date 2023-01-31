<?php

namespace Database\Factories;
use Tests\TestCase;
use App\Models\post;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'title' => fake()->title(),
            'description' => 'this is a course',
            'created_at' => now(),
        ];
    }
}

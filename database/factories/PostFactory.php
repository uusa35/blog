<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(12),
            'content' => $this->faker->paragraph(70),
            'image' => 'https://source.unsplash.com/random/200x200?sig=1'.rand(1,90),
            'user_id' => User::all()->random()->id,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;
use Faker\Core\Number;
use Illuminate\Support\Str;
use Illuminate\Support\number_format;

class PostFactory extends Factory
{
    protected $post = Post::class;
    protected $user = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => Str::random(10),
            'description' => Str::random(10),
            'created_at' => time(),
            'updated_at' => time(),
            // 'name'=> Str::random(5)
            // 'user_id'=>Str::random()
            //
        ];
    }

}

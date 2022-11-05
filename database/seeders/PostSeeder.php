<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Faker\Core\Number;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'title' => Str::random(10),
        //     'description' => Str::random(10),
        //     'created_at' => time(),
        //     'updated_at' => time(),
        //     'user_id'=>Str::random_int(5,10),
        //     'name'=> Str::random(5)
        // ]);
        //
        Post::factory()->count(500)->create();
        User::factory()->count(500)->create();
    }
}

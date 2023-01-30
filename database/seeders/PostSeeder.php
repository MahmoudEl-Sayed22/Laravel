<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
      *@protected
     * @return void
     */
    public function run()
    {


        Post::factory()->count(50)->create();
    }

}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call([
        	AdminSeeder::class,
        ]);
        Blog::factory(10)->create();
        // \App\Models\User::factory(10)->create();
    }
}

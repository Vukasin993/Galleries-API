<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            UserSeeder::class,
            GallerySeeder::class,
            ImageSeeder::class,
            CommentSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
        // \App\Models\Gal::factory(10)->create();
        // \App\Models\User::factory(10)->create();
    }
}

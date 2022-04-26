<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            UsersRolesTableSeeder::class,
            PostsTableSeeder::class,
            PostCategoriesTableSeeder::class,
            ClothSizeSeeder::class,
            ShoeSizeSeeder::class,
            ProductCategoriesSeeder::class,
            BrandSeeder::class,
            GenderSeeder::class,
            ColourSeeder::class,

        ]);
    }
}

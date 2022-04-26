<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            'name' => 'T-shirt',
            'slug' => 'T-shirt',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('product_categories')->insert([
            'name' => 'Shorten',
            'slug' => 'Shorten',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('product_categories')->insert([
            'name' => 'Broeken',
            'slug' => 'Broeken',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('product_categories')->insert([
            'name' => 'Jassen',
            'slug' => 'Jassen',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('product_categories')->insert([
            'name' => 'Kousen',
            'slug' => 'Kousen',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('product_categories')->insert([
            'name' => 'Rokjes',
            'slug' => 'Rokjes',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('product_categories')->insert([
            'name' => 'Kleedjes',
            'slug' => 'Kleedjes',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);

    }
}

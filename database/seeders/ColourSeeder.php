<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colours')->insert([
            'name' => 'Wit',
            'slug' => 'Wit',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('colours')->insert([
            'name' => 'Zwart',
            'slug' => 'Zwart',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('colours')->insert([
            'name' => 'Blauw',
            'slug' => 'Blauw',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('colours')->insert([
            'name' => 'Rood',
            'slug' => 'Rood',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('colours')->insert([
            'name' => 'Groen',
            'slug' => 'Groen',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('colours')->insert([
            'name' => 'Roze',
            'slug' => 'Roze',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            'name' => 'Wit',
            'slug' => 'Wit',
            'code' => '#ffffff',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('colors')->insert([
            'name' => 'Zwart',
            'slug' => 'Zwart',
            'code' => '#000000',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('colors')->insert([
            'name' => 'Blauw',
            'slug' => 'Blauw',
            'code' => '#0c1ae4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('colors')->insert([
            'name' => 'Rood',
            'slug' => 'Rood',
            'code' => '#dd0808',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('colors')->insert([
            'name' => 'Groen',
            'slug' => 'Groen',
            'code' => '#0fa10c',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('colors')->insert([
            'name' => 'Roze',
            'slug' => 'Roze',
            'code' => '#d22dbc',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('colors')->insert([
            'name' => 'Geel',
            'slug' => 'Geel',
            'code' => '#fbff00',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}

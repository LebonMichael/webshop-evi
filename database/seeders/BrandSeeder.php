<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'name' => 'Le Chic',
            'slug' => 'Le Chic',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);

        DB::table('brands')->insert([
            'name' => 'Elle Chic',
            'slug' => 'Elle chic',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);

        DB::table('brands')->insert([
            'name' => 'Carlomagno',
            'slug' => 'Carlomagno',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);

        DB::table('brands')->insert([
            'name' => 'Like Flo',
            'slug' => 'Like Flo',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);

        DB::table('brands')->insert([
            'name' => 'Nono',
            'slug' => 'Nono',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);

        DB::table('brands')->insert([
            'name' => 'Name It',
            'slug' => 'Name It',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'is_active' => 1,
            'first_name' => 'Michael',
            'last_name' => 'Lebon',
            'email' => 'lebontje45@hotmail.com',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'photo_id' => 0,
            'password' => bcrypt(12345678),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'is_active' => 1,
            'first_name' => 'Evi',
            'last_name' => 'Vermote',
            'email' => 'evi_vermote@hotmail.com',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'photo_id' => 0,
            'password' => bcrypt(12345678),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'is_active' => 1,
            'first_name' => 'Dylan',
            'last_name' => 'Debruyne',
            'email' => 'dylan@hotmail.com',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'photo_id' => 0,
            'password' => bcrypt(12345678),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        User::factory()->count(50)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UsersRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();

        User::all()->each(function ($user) use ($roles){
            if($user['id'] === 1 ){
                $user->roles()->sync([1,2]);
            }elseif($user['id'] === 2){
                $user->roles()->sync([1,2]);
            }elseif($user['id'] > 2){
                $otherRoles = [3,4,5];
                $random = Arr::random($otherRoles,rand(1,3));
                $user->roles()->sync($random);
              /* $user->roles()->attach(
                    $roles->random($test,rand(4,5))->pluck('id')->toArray()
                );*/
            }
        });
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name','admin')->first(); 
        $authorRole = Role::where('name','author')->first(); 
        $userRole = Role::where('name','user')->first(); 

        $admin =User::create([
            'name'=>'Admin User',
            'email'=>'admin@gmail.com',
            'password'=> Hash::make('password')
        ]);

        $author =User::create([
            'name'=>'Author User',
            'email'=>'author@gmail.com',
            'password'=> Hash::make('password')
        ]);

        $user =User::create([
            'name'=>'Generic User',
            'email'=>'user@gmail.com',
            'password'=> Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);

    }
}

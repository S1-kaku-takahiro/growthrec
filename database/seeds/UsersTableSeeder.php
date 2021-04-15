<?php

use Illuminate\Database\Seeder;

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
            'name' => 'associate_editor',
            'email' => 'associate_editor@gmail.com',
            'password' => Hash::make('password'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'viewer0',
            'email' => 'viewer0@gmail.com',
            'password' => Hash::make('password'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'viewer1',
            'email' => 'viewer1@gmail.com',
            'password' => Hash::make('password'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'viewer2',
            'email' => 'viewer2@gmail.com',
            'password' => Hash::make('password'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'viewer3',
            'email' => 'viewer3@gmail.com',
            'password' => Hash::make('password'),
        ]);
        
        
        
    }
}

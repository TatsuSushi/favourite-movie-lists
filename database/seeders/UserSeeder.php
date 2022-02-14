<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user1ID = DB::table('users')->insertGetId([
            'firstName' =>'Anona',
            'lastName'=>'Cruz',
            'email'=>'user@user.com',
            'password'=> Hash::make('12345678'),
        ]);

       DB::table('user_favourite_movies')->insert([
          ['user_id' => $user1ID, 'favourite_movie_id' => 'tt0848228'],
          ['user_id' => $user1ID, 'favourite_movie_id' => 'tt4154756'],
          ['user_id' => $user1ID, 'favourite_movie_id' => 'tt2395427'],
          ['user_id' => $user1ID, 'favourite_movie_id' => 'tt4154796']
       ]);

        $user2ID = DB::table('users')->insertGetId([
            'firstName' =>'Camilla',
            'lastName'=>'Sayer',
            'email'=>'user2@user.com',
            'password'=> Hash::make('12345678'),
        ]);

        DB::table('user_favourite_movies')->insert([
            ['user_id' => $user2ID, 'favourite_movie_id' => 'tt4154756'],
            ['user_id' => $user2ID, 'favourite_movie_id' => 'tt10515848'],
            ['user_id' => $user2ID, 'favourite_movie_id' => 'tt0120575'],
        ]);

        $user3ID = DB::table('users')->insertGetId([
            'firstName' =>'Ganesh',
            'lastName'=>'Zentai',
            'email'=>'user3@user.com',
            'password'=> Hash::make('12345678'),
        ]);

        DB::table('user_favourite_movies')->insert([
            ['user_id' => $user3ID, 'favourite_movie_id' => 'tt0287871'],
            ['user_id' => $user3ID, 'favourite_movie_id' => 'tt2975590'],
            ['user_id' => $user3ID, 'favourite_movie_id' => 'tt0103776'],
            ['user_id' => $user3ID, 'favourite_movie_id' => 'tt4116284'],
            ['user_id' => $user3ID, 'favourite_movie_id' => 'tt2313197'],
        ]);

        $user4ID = DB::table('users')->insertGetId([
            'firstName' =>'Vivien',
            'lastName'=>'Straub',
            'email'=>'user4@user.com',
            'password'=> Hash::make('12345678'),
        ]);

        DB::table('user_favourite_movies')->insert([
            ['user_id' => $user4ID, 'favourite_movie_id' => 'tt0926084'],
            ['user_id' => $user4ID, 'favourite_movie_id' => 'tt0417741'],
        ]);

        $user5ID = DB::table('users')->insertGetId([
            'firstName' =>'Bernardita',
            'lastName'=>'Bishop',
            'email'=>'user5@user.com',
            'password'=> Hash::make('12345678'),
        ]);

        DB::table('user_favourite_movies')->insert([
            ['user_id' => $user5ID, 'favourite_movie_id' => 'tt0389860'],
        ]);
    }
}

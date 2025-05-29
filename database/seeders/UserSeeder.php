<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'judika',
                'username'=>'EdwardJudika',
                'password'=>bcrypt('12345678')
            ],
            [
                'name'=>'Aka indo',
                'username'=>'akaindo',
                'password'=>bcrypt('abcdefgh')
            ],
            [
                'name'=>'Afandi',
                'username'=>'fahrilafnd',
                'password'=>bcrypt('qwertyui')
            ],
            [
                'name'=>'Arifa',
                'username'=>'arifaamilani',
                'password'=>bcrypt('abcd123')
            ]
        ];
        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
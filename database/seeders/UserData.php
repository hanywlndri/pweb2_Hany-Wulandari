<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Petugas',
                'password' => bcrypt('123456'),
                'email' => 'petugas@posrem.com'
            ],

            [
                'name' => 'Ketua',
                'password' => bcrypt('123456'),
                'email' => 'ketua@posrem.com'
            ],
        ];

        foreach($user as $key => $value){
            User::create($value);
        }
        //
    }
}

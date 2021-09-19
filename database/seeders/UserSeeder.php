<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\UserRole;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'admin',
            'email' => 'admin@laravelstarter.loc',
            'password' => Hash::make('12345678')
        ];
        $r = User::create($data);


        $userRole = [
            'user_id'=> $r->id,
            'role_id'=> 1
        ];
        UserRole::create($userRole);        
    }
}

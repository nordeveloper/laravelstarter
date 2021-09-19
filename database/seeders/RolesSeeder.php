<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arRoles = [
            [
                'name' => 'Administrator',
                'code' => 'admin',
                'description' => 'Super Administrator',
                'created_at'=>time(),
                'updated_at'=>time()
            ],
            [
                'name' => 'Manager',
                'code' => 'manager',
                'description' => 'Manaager',
                'created_at'=>time(),
                'updated_at'=>time()
            ],
        ];

        foreach ($arRoles as $key => $value) {
            Role::create($value);
        }
    }
}

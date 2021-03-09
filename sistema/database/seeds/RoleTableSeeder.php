<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Role_user;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            [
                'name' => 'Admin',
                'label' => 'Administrador do sistema',
            ],
            [
                'name' => 'Master',
                'label' => 'Administrador Master na prefeitura'
            ]
        );
        foreach ($roles as $key => $value) {
            Role::create($value);
        }

        $role_users = array(
            [
                'role_id' => '1',
                'user_id' => '1'
            ],
            [
                'role_id' => '2',
                'user_id' => '2'
            ]
        );
        foreach ($role_users as $key => $value) {
            Role_user::create($value);
        }
    }
}

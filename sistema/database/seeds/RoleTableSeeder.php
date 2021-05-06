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
                'name' => 'Contabilidade',
                'label' => 'Contabilidade',
            ],
            [
                'name' => 'Usuário que realiza requisição',
                'label' => 'Usuário normal nivel 1',
            ],
            [
                'name' => 'Secretário(a) Municipal	 ',
                'label' => 'Secretário municipal responsável por aprovar requisições de suas unidades respectivas ',
            ],
            [
                'name' => 'Emepenho ',
                'label' => 'Com essa permissão é possivel visualizar toda as requisições que foram enviadas para empenho e finalizar ',
            ],
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
            ],
            [
                'role_id' => '3',
                'user_id' => '3'
            ],
            [
                'role_id' => '4',
                'user_id' => '4'
            ],
            [
                'role_id' => '5',
                'user_id' => '5'
            ]
        );
        foreach ($role_users as $key => $value) {
            Role_user::create($value);
        }
    }
}

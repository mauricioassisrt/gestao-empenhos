<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Permission_role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = array(
            [
                'name' => 'Edit_post',
                'label' => 'Editar post',
            ],
            [
                'name' => 'View_post',
                'label' => 'Visualizar post',
            ],
            [
                'name' => 'Delete_post',
                'label' => 'Deletar post',
            ],
            [
                'name' => 'Insert_post',
                'label' => 'Adicionar post',
            ],
            [
                'name' => 'View_user',
                'label' => 'Visualizar usuário',
            ],
            [
                'name' => 'Edit_user',
                'label' => 'Editar usuário',
            ],
            [
                'name' => 'Delete_user',
                'label' => 'Deletar usuário',
            ],
            [
                'name' => 'Insert_user',
                'label' => 'Adicionar usuário',
            ],
            [
                'name' => 'View_role',
                'label' => 'Visualizar role',
            ],
            [
                'name' => 'Insert_role',
                'label' => 'Adicionar role',
            ],
            [
                'name' => 'Role_permission',
                'label' => 'Relação role permission',
            ],
            [
                'name' => 'View_permission',
                'label' => 'Visualizar permission',
            ],
            [
                'name' => 'Insert_permission',
                'label' => 'Adicionar permission',
            ],
            [
                'name' => 'insert_pessoa',
                'label' => 'Adicionar Pessoa',
            ],
            [
                'name' => 'pessoa_edit',
                'label' => 'Adicionar Pessoa',
            ],
            [
                'name' => 'pessoa_delete',
                'label' => 'Excluir Pessoa'
            ],
            [
                'name' => 'pessoa_view',
                'label' => 'Visualizar pessoa'
            ],
            [
                'name' => 'empresa_view',
                'label' => 'Visualiza os dados da empresa'
            ],
            [
                'name' => 'dashboard_empresa',
                'label' => 'Exibe ao usuário logar o dashboard da empresa e não o dashboard do administrador '
            ],
            [
                'name'=>'alter_empresa',
                'label' => 'Permite alterar os dados da empresa inserida no sistema '
            ],
            [
                'name'=>'Edit_user_logado',
                'label' => 'Permite alterar os dados da empresa inserida no sistema '
            ],
            [
                'name'=>'pessoa_redefinir_senha',
                'label' => 'Habilita a redefinição de senha  '
            ],



        );
        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }

        $permission_roles = array(
            [
                'permission_id' => '1',
                'role_id' => '1'
            ],
            [
                'permission_id' => '2',
                'role_id' => '1'
            ],
            [
                'permission_id' => '3',
                'role_id' => '1'
            ],
            [
                'permission_id' => '4',
                'role_id' => '1'
            ],
            [
                'permission_id' => '5',
                'role_id' => '1'
            ],
            [
                'permission_id' => '6',
                'role_id' => '1'
            ],
            [
                'permission_id' => '7',
                'role_id' => '1'
            ],
            [
                'permission_id' => '8',
                'role_id' => '1'
            ],
            [
                'permission_id' => '9',
                'role_id' => '1'
            ],
            [
                'permission_id' => '10',
                'role_id' => '1'
            ],
            [
                'permission_id' => '11',
                'role_id' => '1'
            ],
            [
                'permission_id' => '12',
                'role_id' => '1'
            ],
            [
                'permission_id' => '13',
                'role_id' => '1'
            ],
            [
                'permission_id' => '14',
                'role_id' => '1'
            ],
            [
                'permission_id' => '15',
                'role_id' => '1'
            ],
            [
                'permission_id' => '16',
                'role_id' => '1'
            ],
            [
                'permission_id' => '17',
                'role_id' => '1'
            ],
            [
                'permission_id' => '18',
                'role_id' => '1'
            ],
            [
                'permission_id' => '19',
                'role_id' => '1'
            ],
            [
                'permission_id' => '20',
                'role_id' => '1'
            ],
            [
                'permission_id' => '21',
                'role_id' => '1'
            ],
        );
        foreach ($permission_roles as $key => $value) {
            Permission_role::create($value);
        }
    }
}

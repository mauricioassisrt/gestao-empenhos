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
                'name' => 'alter_empresa',
                'label' => 'Permite alterar os dados da empresa inserida no sistema '
            ],
            [
                'name' => 'Edit_user_logado',
                'label' => 'Permite alterar os dados da empresa inserida no sistema '
            ],
            [
                'name' => 'pessoa_redefinir_senha',
                'label' => 'Habilita a redefinição de senha  '
            ],
            [
                'name' => 'Edit_categoria',
                'label' => 'Editar categoria do produto',
            ],
            [
                'name' => 'View_categoria',
                'label' => 'Visualizar categoria',
            ],
            [
                'name' => 'Delete_categoria',
                'label' => 'Deletar categoria ',
            ],
            [
                'name' => 'Insert_categoria',
                'label' => 'Adicionar categoria',
            ],

            [
                'name' => 'Edit_fornecedor',
                'label' => 'Editar fornecedor do produto',
            ],
            [
                'name' => 'View_fornecedor',
                'label' => 'Visualizar fornecedor',
            ],
            [
                'name' => 'Delete_fornecedor',
                'label' => 'Deletar fornecedor ',
            ],
            [
                'name' => 'Insert_fornecedor',
                'label' => 'Adicionar fornecedor',
            ],


            [
                'name' => 'Edit_secretaria',
                'label' => 'Editar secretaria do produto',
            ],
            [
                'name' => 'View_secretaria',
                'label' => 'Visualizar secretaria',
            ],
            [
                'name' => 'Delete_secretaria',
                'label' => 'Deletar secretaria ',
            ],
            [
                'name' => 'Insert_secretaria',
                'label' => 'Adicionar secretaria',
            ],

            [
                'name' => 'Edit_unidade',
                'label' => 'Editar unidade vinculada a secretaria ',
            ],
            [
                'name' => 'View_unidade',
                'label' => 'Visualizar unidade',
            ],
            [
                'name' => 'Delete_unidade',
                'label' => 'Deletar unidade ',
            ],
            [
                'name' => 'Insert_unidade',
                'label' => 'Adicionar unidade',
            ],


            [
                'name' => 'Edit_produto',
                'label' => 'Editar  do produto',
            ],
            [
                'name' => 'View_produto',
                'label' => 'Visualizar produto',
            ],
            [
                'name' => 'Delete_produto',
                'label' => 'Deletar produto ',
            ],
            [
                'name' => 'Insert_produto',
                'label' => 'Adicionar produto',
            ],
            [
                'name' => 'Insert_setor',
                'label' => 'Adicionar setor',
            ],
            [
                'name' => 'View_setor',
                'label' => 'Visualizar setor',
            ],
            [
                'name' => 'Edit_setor',
                'label' => 'Editar setor',
            ],
            [
                'name' => 'Delete_setor',
                'label' => 'Apagar setor',
            ],
            [
                'name' => 'Insert_requisicao',
                'label' => 'Adicionar requisicao',
            ],
            [
                'name' => 'View_requisicao',
                'label' => 'Visualizar requisicao',
            ],
            [
                'name' => 'Edit_requisicao',
                'label' => 'Editar requisicao',
            ],
            [
                'name' => 'Delete_requisicao',
                'label' => 'Apagar requisicao',
            ],
            [
                'name' => 'pessoa_vincular_unidade',
                'label' => 'Vincula um usuário a uma unidade ',
            ],
            [
                'name' => 'insert_unidade_pessoa',
                'label' => 'Insere na unidad a pessao  ',
            ],

            [
                'name' => 'Edit_licitacao',
                'label' => 'Editar licitacao',
            ],
            [
                'name' => 'View_licitacao',
                'label' => 'Visualizar licitacao',
            ],
            [
                'name' => 'Delete_licitacao',
                'label' => 'Deletar licitacao',
            ],
            [
                'name' => 'Insert_licitacao',
                'label' => 'Adicionar licitacao',
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
            [
                'permission_id' => '21',
                'role_id' => '1'
            ],
            [
                'permission_id' => '22',
                'role_id' => '1'
            ],
            [
                'permission_id' => '23',
                'role_id' => '1'
            ],
            [
                'permission_id' => '24',
                'role_id' => '1'
            ],
            [
                'permission_id' => '25',
                'role_id' => '1'
            ],
            [
                'permission_id' => '26',
                'role_id' => '1'
            ],
            [
                'permission_id' => '27',
                'role_id' => '1'
            ],
            [
                'permission_id' => '28',
                'role_id' => '1'
            ],
            [
                'permission_id' => '29',
                'role_id' => '1'
            ],
            [
                'permission_id' => '30',
                'role_id' => '1'
            ],
            [
                'permission_id' => '31',
                'role_id' => '1'
            ],
            [
                'permission_id' => '32',
                'role_id' => '1'
            ],  [
                'permission_id' => '33',
                'role_id' => '1'
            ],
            [
                'permission_id' => '34',
                'role_id' => '1'
            ],
            [
                'permission_id' => '35',
                'role_id' => '1'
            ],
            [
                'permission_id' => '36',
                'role_id' => '1'
            ],
            [
                'permission_id' => '37',
                'role_id' => '1'
            ],
            [
                'permission_id' => '38',
                'role_id' => '1'
            ],
            [
                'permission_id' => '39',
                'role_id' => '1'
            ],
            [
                'permission_id' => '40',
                'role_id' => '1'
            ],
            [
                'permission_id' => '41',
                'role_id' => '1'
            ],   [
                'permission_id' => '42',
                'role_id' => '1'
            ],
            [
                'permission_id' => '43',
                'role_id' => '1'
            ],
            [
                'permission_id' => '44',
                'role_id' => '1'
            ],
            [
                'permission_id' => '45',
                'role_id' => '1'
            ],
            [
                'permission_id' => '46',
                'role_id' => '1'
            ],
            [
                'permission_id' => '47',
                'role_id' => '1'
            ],
            [
                'permission_id' => '48',
                'role_id' => '1'
            ],
            [
                'permission_id' => '49',
                'role_id' => '1'
            ],
            [
                'permission_id' => '50',
                'role_id' => '1'
            ],
            [
                'permission_id' => '22',
                'role_id' => '2'
            ],
            [
                'permission_id' => '23',
                'role_id' => '2'
            ],
            [
                'permission_id' => '24',
                'role_id' => '2'
            ],
            [
                'permission_id' => '25',
                'role_id' => '2'
            ],
            [
                'permission_id' => '26',
                'role_id' => '2'
            ],
            [
                'permission_id' => '27',
                'role_id' => '2'
            ],
            [
                'permission_id' => '28',
                'role_id' => '2'
            ],
            [
                'permission_id' => '29',
                'role_id' => '2'
            ],
            [
                'permission_id' => '30',
                'role_id' => '2'
            ],
            [
                'permission_id' => '31',
                'role_id' => '2'
            ],
            [
                'permission_id' => '32',
                'role_id' => '2'
            ],
            [
                'permission_id' => '33',
                'role_id' => '2'
            ],
            [
                'permission_id' => '34',
                'role_id' => '2'
            ],
            [
                'permission_id' => '35',
                'role_id' => '2'
            ],
            [
                'permission_id' => '36',
                'role_id' => '2'
            ],
            [
                'permission_id' => '37',
                'role_id' => '2'
            ],
            [
                'permission_id' => '38',
                'role_id' => '2'
            ],
            [
                'permission_id' => '39',
                'role_id' => '2'
            ],
            [
                'permission_id' => '40',
                'role_id' => '2'
            ],
            [
                'permission_id' => '41',
                'role_id' => '2'
            ],
            [
                'permission_id' => '42',
                'role_id' => '2'
            ],
            [
                'permission_id' => '43',
                'role_id' => '2'
            ],
            [
                'permission_id' => '44',
                'role_id' => '2'
            ],
            [
                'permission_id' => '45',
                'role_id' => '2'
            ],
            [
                'permission_id' => '46',
                'role_id' => '2'
            ],
            [
                'permission_id' => '47',
                'role_id' => '2'
            ],
            [
                'permission_id' => '48',
                'role_id' => '2'
            ],
            [
                'permission_id' => '49',
                'role_id' => '2'
            ],
            [
                'permission_id' => '50',
                'role_id' => '2'
            ],
            [
                'permission_id' => '47',
                'role_id' => '1'
            ],
            [
                'permission_id' => '48',
                'role_id' => '1'
            ],
            [
                'permission_id' => '49',
                'role_id' => '1'
            ],
            [
                'permission_id' => '50',
                'role_id' => '1'
            ],
            [
                'permission_id' => '51',
                'role_id' => '1'
            ],
            [
                'permission_id' => '52',
                'role_id' => '2'
            ],
            [
                'permission_id' => '53',
                'role_id' => '2'
            ],
            [
                'permission_id' => '54',
                'role_id' => '2'
            ],
            [
                'permission_id' => '55',
                'role_id' => '2'
            ],
            [
                'permission_id' => '52',
                'role_id' => '1'
            ],
            [
                'permission_id' => '53',
                'role_id' => '1'
            ],
            [
                'permission_id' => '54',
                'role_id' => '1'
            ],
            [
                'permission_id' => '55',
                'role_id' => '1'
            ],


        );
        foreach ($permission_roles as $key => $value) {
            Permission_role::create($value);
        }
    }
}

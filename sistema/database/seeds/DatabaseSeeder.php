<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmpresaSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PessoaSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        // $this->call(CategoriaSeeder::class);
        // $this->call(FornecedorSeeder::class);
        // $this->call(SecretariaSeeder::class);
        // $this->call(UnidadeSeeder::class);
        // $this->call(ProdutoSeeder::class);
        // $this->call(RequisicaoSeeder::class);
        // $this->call(LicitacaoSeeder::class);
    }
}

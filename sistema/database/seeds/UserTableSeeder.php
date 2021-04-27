<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            [
                'name' => 'Administrador',
                'email' => 'admin@laravel.com',
                'password' => bcrypt('admin1234')
            ],
            [
                'name' => 'Gerente prefeitura',
                'email' => 'gerente@prefeitura.com',
                'password' => bcrypt('123')
            ],
            [
                'name' => 'Maria josé',
                'email' => 'maria@prefeitura.com',
                'password' => bcrypt('123')
            ],
            [
                'name' => 'Sec saude',
                'email' => 'secretario@saude.com',
                'password' => bcrypt('123')
            ]
        );
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}

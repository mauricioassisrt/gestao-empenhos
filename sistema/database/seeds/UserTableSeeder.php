<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Pessoa;

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
                'password' => bcrypt('123')
            ],
            [
                'name' => 'MASTER PREFEITURA',
                'email' => 'master@laravel.com',
                'password' => bcrypt('123')
            ]
        );
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}

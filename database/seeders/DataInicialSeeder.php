<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DataInicialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->miusuario();
        $this->usuarios();
    }

    protected function miusuario()
    {
        User::create([
            'name' => 'Oscar Bertel P',
            'email' => 'oscar@ebercon.com',
            'password' => bcrypt('87654321')
        ]);
    }

    protected function usuarios()
    {
        User::factory(10)->create();
    }
}

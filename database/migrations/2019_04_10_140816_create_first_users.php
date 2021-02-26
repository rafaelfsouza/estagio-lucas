<?php

use Illuminate\Database\Migrations\Migration;
use Impacto\Usuarios\Usuario;

class CreateFirstUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Usuario::create([
            'nome' => 'Dev Impacto',
            'email' => 'dev@impacto.online',
            'password' => bcrypt('123456'),
            'ativo' => true,
            'perfil_id' => 1
        ]);
    }

}

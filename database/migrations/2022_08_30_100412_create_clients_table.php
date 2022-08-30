<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('CPF')->unique();
            $table->string('email')->unique()->nullable();
            $table->enum('sexo',['M','F','I']);
            $table->string('nascimento')->nullable();
            $table->string('telefone');
            $table->string('endereco')->nullable();
            $table->string('bairro')->nullable();
            $table->string('estado')->nullable();
            $table->string('cidade')->nullable();
            $table->string('cep')->nullable();
            $table->boolean('apagado')->default(0);
            $table->timestamps();
            
            $table->index(['CPF']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}

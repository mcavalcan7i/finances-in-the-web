<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriptoinvestimentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criptoinvestimentos', function (Blueprint $table) {
            $table->id();
            $table->string("nome_criptoinvestimento", 100);
            $table->float("valor_real", 8, 2);
            $table->string("valor_cripto", 20);
            $table->date("data_criptoinvestimento");
            $table->float("cotacao_dia", 8, 2);
            $table->unsignedBigInteger("user_id");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criptoinvestimentos');
    }
}

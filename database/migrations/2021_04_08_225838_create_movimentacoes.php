<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->id();
            $table->string("nome_movimentacao", 255);
            $table->float("valor_movimentacao", 8, 2);
            $table->text("descricao_movimentacao");
            $table->string("tipo_movimentacao", 25);
            $table->date("data_movimentacao");
            $table->unsignedBigInteger("user_id");
            $table->timestamps();

            // Criação do relacionamento
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
        Schema::dropIfExists('movimentacoes');
    }
}

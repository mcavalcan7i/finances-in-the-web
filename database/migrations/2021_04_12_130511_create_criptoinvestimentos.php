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
            $table->float("valor_real", 9, 2);
            $table->
            $table->timestamps();
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

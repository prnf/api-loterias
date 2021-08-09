<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loterias', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->text("link")->nullable();
            $table->text("json")->nullable();
            $table->timestamps();
        });

        //Popula o banco de dados com os nomes das loterias
        $seeder = new LoteriasSeeder();
        $seeder->run();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loterias');
    }
}

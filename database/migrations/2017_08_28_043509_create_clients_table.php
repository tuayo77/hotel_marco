<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id_clt');
            $table->string('nom_clt');
            $table->string('date_nais_clt');
            $table->string('lieux');
            $table->string('nationalite');
            $table->string('sexe');
            $table->string('pays_resi');
            $table->string('telephone');
            $table->string('profession');
            $table->string('from');
            $table->string('to');
            $table->string('cni');
            $table->string('deliver');
            $table->string('transport');
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
        Schema::dropIfExists('clients');
    }
}

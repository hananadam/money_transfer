<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('name', 100)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('website', 250)->nullable();
            $table->string('email', 100)->nullable()->unique();
            $table->timestamps();
        });
        Schema::table('agency', function($table) {
            $table->foreign('company_id')->references('id')->on('company');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agency');
    }
}

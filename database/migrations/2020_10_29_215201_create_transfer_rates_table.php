<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('currency_id')->unsigned();
            $table->integer('agency_id')->unsigned();
            $table->string('from_country', 100);
            $table->string('to_country', 100);
            $table->integer('amount_start_range');
            $table->integer('amount_end_range');
            $table->integer('transfer_fee');

            $table->timestamps();
        });
        Schema::table('transfer_rates', function($table) {
            $table->foreign('currency_id')->references('id')->on('currency');
            $table->foreign('agency_id')->references('id')->on('agency');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_rates');
    }
}

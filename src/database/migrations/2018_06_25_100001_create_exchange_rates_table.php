<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeRatesTable extends Migration
{
    public function up()
    {
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('from_id')->unsigned();
            $table->foreign('from_id')->references('id')->on('currencies');
            $table->integer('to_id')->unsigned();
            $table->foreign('to_id')->references('id')->on('currencies');

            $table->decimal('conversion', 12, 6);

            $table->date('date');

            $table->unique(['from_id', 'to_id', 'date']);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exchange_rates');
    }
}

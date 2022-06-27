<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable(false);
            $table->string('roomtype');
            //$table->foreign('roomtype')->references('type')->on('roomtypes');
            $table->integer('residents');
            //$table->foreign('residents')->references('persons')->on('roomtypes');
            $table->date('check_in');
            $table->date('check_out');
            $table->text('comment');
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
        Schema::dropIfExists('offer');
    }
};

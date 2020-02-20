<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthdecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthdec', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('vendor_id')->unsigned();   
            $table->foreign('vendor_id')->references('id')->on('vendor')->onDelete('cascade');
            $table->string('nric_no');
            $table->integer('contact_no');
            $table->boolean('has_mainland_china');
            $table->boolean('has_conformed_patient');
            $table->boolean('illness');
            $table->boolean('current_temp');
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
        Schema::dropIfExists('healthdec');
    }
}

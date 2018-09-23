<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_stages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('endproduct_id')->unsigned();
            $table->integer('amount')->nullable();
            $table->integer('status')->unsigned();
            $table->string('reference_id');
            $table->date('deleted_at')->nullable();
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
        Schema::dropIfExists('final_stages');
    }
}

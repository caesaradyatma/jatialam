<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuttingStageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cutting_stages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('item_name')->nullable();
            $table->integer('item_id')->unsigned();
            $table->string('sender_pic')->nullable();
            $table->integer('expected_amount')->nullable();
            $table->integer('real_amount')->nullable();
            $table->integer('reference_id')->nullable();
            $table->date('arrival_date')->nullable();
            $table->date('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cutting_stages');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjustmentitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjustmentitems', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('adj_reason');
            $table->date('adj_date');
            $table->integer('adj_items');
            $table->string('adj_ass');
            $table->integer('adj_length');
            $table->integer('adj_width');
            $table->integer('adj_height');
            $table->mediumText('adj_note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adjustmentitems', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssambliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assamblies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('ass_name');
            $table->string('ass_number');
            $table->integer('ass_unit');
            $table->string('ass_assignment');
            $table->string('ass_status');
            $table->integer('item_id');
            $table->string('ass_desc');
            $table->date('ass_delete');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assamblies');
    }
}

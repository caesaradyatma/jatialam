<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventorylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventorylists', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('cat_name');
            $table->string('cat_code');
            $table->string('cat_measurement');
            $table->string('cat_qty');
            $table->string('cat_delete');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventorylists');
    }
}

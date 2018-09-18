<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResetEndproductIdOnOvenStages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('oven_stages', function (Blueprint $table) {
            
            $table->foreign('endproduct_id')->references('id')->on('inventorylists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oven_stages', function (Blueprint $table) {
            $table->dropColumn('endproduct_id');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemIdToManufacturingReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('manufacturing_reports', function(Blueprint $table) {
            $table->integer('item_id')->nullable();
            $table->string('item_dimension')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('manufacturing_reports', function(Blueprint $table) {
            $table->dropColumn('item_id');
            $table->dropColumn('dimension');
        });
        
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDimensionToOvenStagesAndFinalStages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('oven_stages', function(Blueprint $table) {
            $table->string('dimension')->nullable();
        });

        Schema::table('final_stages', function(Blueprint $table) {
            $table->string('dimension')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oven_stages', function(Blueprint $table) {
            $table->dropColumn('dimension');
        });

        Schema::table('final_stages', function(Blueprint $table) {
            $table->dropColumn('dimension');
        });
    }
}

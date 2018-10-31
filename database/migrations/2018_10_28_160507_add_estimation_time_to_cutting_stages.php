<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstimationTimeToCuttingStages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('cutting_stages', function(Blueprint $table) {
            $table->datetime('estimation_time')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('cutting_stages', function(Blueprint $table) {
            $table->dropColumn('estimation_time');
        });
        
    }
}

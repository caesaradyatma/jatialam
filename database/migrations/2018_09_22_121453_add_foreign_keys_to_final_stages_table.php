<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToFinalStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('final_stages', function(Blueprint $table) {
            $table->foreign('status')->references('id')->on('statuses')->onDelete('cascade');
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
        Schema::table('final_stages', function(Blueprint $table) {
            $table->dropColumnh('status');
            $table->dropColumnh('endproduct_id');
        });
    }
}

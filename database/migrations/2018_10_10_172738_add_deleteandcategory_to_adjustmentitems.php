<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeleteandcategoryToAdjustmentitems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adjustmentitems', function (Blueprint $table) {
            $table->date('adj_delete')->nullable();
            $table->integer('adj_cat');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('adj_delete');
        $table->dropColumn('adj_cat');
        
    }
}

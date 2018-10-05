<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameAmountsColumnInPurchasings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('purchasings', function(Blueprint $table) {
            $table->renameColumn('expected_amount','amount');
            $table->renameColumn('real_amount','rejected_amount');
            $table->integer('item_id')->unsigned();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchasings', function(Blueprint $table) {
            $table->renameColumn('amount','expected_amount');
            $table->renameColumn('rejected_amount','real_amount');
            $table->dropColumn('item_id');
        });
    }
}

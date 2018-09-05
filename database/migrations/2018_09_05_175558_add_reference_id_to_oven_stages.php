<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferenceIdToOvenStages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oven_stages', function (Blueprint $table) {
            $table->string('reference_id');
            $table->integer('endproduct_id')->nullable();
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
            $table->dropColumn('reference_id');
            $table->dropColumn('endproduct_id');
        });
    }
}

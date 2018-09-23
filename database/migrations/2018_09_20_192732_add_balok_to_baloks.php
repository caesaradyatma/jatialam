<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBalokToBaloks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('baloks', function (Blueprint $table) {
            $table->mediumText('details');
            $table->string('balok_measure');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('baloks', function (Blueprint $table) {
            $table->dropColumn('details');
            $table->dropColumn('balok_measure');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAssToAssamblies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assamblies', function (Blueprint $table) {
            $table->date('creation_date');
            $table->date('final_date');
            $table->string('ass_dimension');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('creation_date');
        $table->dropColumn('final_date');
        $table->dropColumn('ass_dimension');
    }
}

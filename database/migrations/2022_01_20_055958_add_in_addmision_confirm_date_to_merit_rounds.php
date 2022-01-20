<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInAddmisionConfirmDateToMeritRounds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merit_rounds', function (Blueprint $table) {
            $table->string('admission_confirm_date')->after('merit_result_declare_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merit_rounds', function (Blueprint $table) {
            //
        });
    }
}

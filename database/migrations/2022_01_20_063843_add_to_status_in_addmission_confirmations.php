<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToStatusInAddmissionConfirmations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addmission_confirmations', function (Blueprint $table) {
            $table->boolean('status')->comment('0 = next, 1 = confirm , 2=pending')->after('confirmation_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addmission_confirmations', function (Blueprint $table) {
            //
        });
    }
}

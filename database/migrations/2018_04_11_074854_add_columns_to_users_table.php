<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('users', function (Blueprint $table) {
              
            $table->string('nationality');

            $table->dateTime('date_of_birth');

            $table->string('gender');

            $table->string('marital_status');

            $table->string('id_number');

            $table->string('mobile_number');

            $table->string('next_of_kin');

            $table->string('next_of_kin_id_no');

            $table->string('address');

            $table->string('employment_status');

            $table->string('linkedin_url');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('=users', function (Blueprint $table) {
            //
        });
    }
}

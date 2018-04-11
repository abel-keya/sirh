<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');   

            $table->integer('employee_id')->unsigned()->index();

            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');

            $table->datetime('start_of_leave');

            $table->datetime('end_of_leave');

            $table->integer('status')->unsigned()->index();

            $table->text('reason');

            $table->text('comments')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}

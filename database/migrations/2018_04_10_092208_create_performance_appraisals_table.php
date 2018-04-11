<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_appraisals', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('employee_id')->unsigned()->index();

            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');

            $table->datetime('evaluation_period_from');

            $table->datetime('evaluation_period_to');

            $table->text('position_description');

            $table->text('position_expertise');

            $table->integer('position_expertise_rating')->unsigned()->index();

            $table->text('approach_to_work');

            $table->integer('approach_to_work_rating')->unsigned()->index();

            $table->text('quality_of_work');

            $table->integer('quality_of_work_rating')->unsigned()->index();

            $table->text('communication_skills');

            $table->integer('communication_skills_rating')->unsigned()->index();
   
            $table->text('interpersonal_skills');

            $table->integer('interpersonal_skills_rating')->unsigned()->index();

            $table->text('other_performance_factors');

            $table->integer('overall_rating')->unsigned()->index(); 

            $table->integer('manager_id')->unsigned()->index();

            $table->foreign('manager_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('performance_appraisals');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->nullable();
            $table->string('desc_company')->default('desc_company');
            $table->text('about_company')->nullable();
            $table->text('about_project')->nullable();
            $table->string('term_project')->default('term_project');
            $table->text('breaf_desc')->nullable();
            $table->text('full_desc')->nullable();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects_descriptions');
    }
}

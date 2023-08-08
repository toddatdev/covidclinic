<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lgg')->nullable();
            $table->string('lgg_result')->nullable();
            $table->string('lgm')->nullable();
            $table->string('lgm_result')->nullable();
            $table->string('flua')->nullable();
            $table->string('flua_result')->nullable();
            $table->string('flub')->nullable();
            $table->string('flub_result')->nullable();
            $table->string('flusars')->nullable();
            $table->string('flusars_result')->nullable();
            $table->string('result_report')->nullable();
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
        Schema::dropIfExists('report_results');
    }
}

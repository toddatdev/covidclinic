<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityReportInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_report_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facility_director')->nullable();
            $table->string('facility_address')->nullable();
            $table->string('facility_phone')->nullable();
            $table->string('facility_clia')->nullable();
            $table->string('facility_ordering_provider')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('facility_report_infos');
    }
}

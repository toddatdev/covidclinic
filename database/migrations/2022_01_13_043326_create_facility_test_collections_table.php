<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityTestCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_test_collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facility')->nullable();
            $table->string('facility_director')->nullable();
            $table->string('facility_address')->nullable();
            $table->string('facility_phone')->nullable();
            $table->string('facility_clia')->nullable();
            $table->string('facility_ordering_provider')->nullable();
            $table->string('specimen_id')->nullable();
            $table->string('test_name')->nullable();
            $table->string('test_device')->nullable();
            $table->string('test_date')->nullable();
            $table->string('test_time')->nullable();

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
        Schema::dropIfExists('facility_test_collections');
    }
}

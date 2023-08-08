<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_test_results', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('test_name_id')->nullable();
            $table->json('test_possibility_id')->nullable();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->unsignedBigInteger('facility_test_collection_id')->nullable();
            $table->string('specimen_id')->nullable();

            $table->string('status')->nullable();
            $table->string('description')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('test_name_id')->references('id')->on('test_names')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patient_information')->onDelete('cascade');
            $table->foreign('facility_test_collection_id')->references('id')->on('facility_test_collections')->onDelete('cascade');

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
        Schema::dropIfExists('medical_test_results');
    }
}

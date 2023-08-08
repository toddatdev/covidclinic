<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestPossibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_possibilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('test_name_id')->nullable();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->longText('suggestion')->nullable();
            $table->foreign('test_name_id')->references('id')->on('test_names')->onDelete('cascade');
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
        Schema::dropIfExists('test_possibilities');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHireTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hire_trans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hire_id');
            $table->boolean('status')->default(1);
            $table->string('title');
            $table->longText('content')->nullable();
            $table->string('locale');
            $table->foreign('hire_id')->references('id')->on('hires')->onDelete('cascade');
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
        Schema::dropIfExists('hire_trans');
    }
}

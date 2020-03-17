<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShareholderTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shareholder__trans', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('images')->nullable();
            $table->longText('contents')->nullable();
            $table->boolean('status')->default(1);
            $table->string('locale');
            $table->unsignedBigInteger('shareholder_id');
            $table->foreign('shareholder_id')->references('id')->on('shareholders')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('shareholder__trans');
    }
}

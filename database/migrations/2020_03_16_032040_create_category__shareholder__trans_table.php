<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryShareholderTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category__shareholder__trans', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('locale');
            $table->unsignedBigInteger('category_id');
            $table->unique(['category_id', 'locale']);
            $table->boolean('status')->default(1);
            $table->foreign('category_id')->references('id')->on('category__shareholders')->onDelete('cascade');
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
        Schema::dropIfExists('category__shareholder__trans');
    }
}

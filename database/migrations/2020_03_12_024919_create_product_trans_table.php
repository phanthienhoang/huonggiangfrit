<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_trans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('price')->default('Contact us');
            $table->string('features');
            $table->string('line_graph');
            $table->string('flattening_curve');
            $table->text('content');
            $table->longText('images');
            $table->text('description');
            $table->string('locale');
            $table->unsignedBigInteger('product_id');
            $table->unique(['product_id', 'locale']);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product_trans');
    }
}

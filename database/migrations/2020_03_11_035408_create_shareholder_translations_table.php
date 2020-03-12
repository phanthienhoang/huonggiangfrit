<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShareholderTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shareholder_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shareholder_id');
            $table->string('locale')->index();

            $table->string('title')->unique();
            $table->longText('content');

            $table->unique(['shareholder_id', 'locale']);
            $table->foreign('shareholder_id')->references('id')->on('shareholders')->onDelete('cascade');
            
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
        Schema::dropIfExists('shareholder_translations');
    }
}

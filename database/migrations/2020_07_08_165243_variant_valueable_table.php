<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VariantValueableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variant_valueable_table', function (Blueprint $table) {
            $table->id();
            $table->foreignId('variant_id');
            $table->foreign('variant_id')->references('id')->on('variants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('valueable_id');
            $table->foreign('valueable_id')->references('id')->on('valueables')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['variant_id','valueable_id']);
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
        Schema::dropIfExists('variant_valueable_table');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('FDW_SKU');
            $table->string('SKU');
            $table->integer('stock');
            $table->float('COG');
            $table->float('price');
            $table->integer('length');
            $table->integer('width');
            $table->integer('height');
            $table->integer('weight');
            $table->string('colour_0')->nullable();
            $table->string('colour_1')->nullable();
            $table->string('colour_2')->nullable();
            $table->string('ASIN_UK')->nullable();
            $table->string('ASIN_CA')->nullable();
            $table->string('ASIN_US')->nullable();
            $table->string('ASIN_FR')->nullable();
            $table->string('ASIN_DE')->nullable();
            $table->string('ASIN_ES')->nullable();
            $table->string('ASIN_IT')->nullable();
            $table->string('ASIN_NL')->nullable();
            $table->string('ASIN_SE')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

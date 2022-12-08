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
            $table->string('quantity');
            $table->float('price', 8, 2);
            $table->string('image')->nullable()->default('coin.png');
            $table->bigInteger('type_id')->unsigned();

            $table->bigInteger('helper_id')->unsigned()->nullable();
            $table->foreign('helper_id')->references('id')->on('helpers')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}

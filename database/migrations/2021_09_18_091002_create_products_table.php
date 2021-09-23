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
            $table->string('name');
            $table->string('type');
            $table->double('price')->default(0);
            $table->text('specification')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->default('default_product.jpg');
            $table->string('isBidable')->default('NO');
            $table->string('bidStatus')->default('ON');
            $table->unsignedBigInteger('categoryID')->index();
            $table->foreign('categoryID')->references('id')->on('categories')->onDelete('cascade')->onUpdate('No Action');
            $table->unsignedBigInteger('subCategoryID')->index();
            $table->foreign('subCategoryID')->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate('No Action');
            $table->unsignedBigInteger('userID')->index()->nullable();
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade')->onUpdate('No Action');
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
        Schema::dropIfExists('products');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variant_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products'); // Link to the 'products' table
            $table->string('color');
            $table->string('size')->nullable();
            $table->integer('stock');
            $table->decimal('price', 8, 2);
            $table->string('image_url'); // Store the image URL directly in the variant record
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
        Schema::dropIfExists('product_variant_images');
    }
}

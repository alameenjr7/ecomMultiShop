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
            $table->string('title');
            $table->string('slug')->unique();
            $table->mediumText('summary');
            $table->longText('description')->nullable();
            $table->longText('additional_info')->nullable();
            $table->longText('return_cancellation')->nullable();
            $table->integer('stock')->default(0);
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('child_cat_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('photo');
            $table->string('size_guide')->nullable();
            $table->float('price')->default(0);
            $table->float('offer_price')->default(0);
            $table->float('discount')->default(0);
            $table->enum('size',['S','M','L','XL'])->default('S');
            $table->enum('conditions',['new','popular','winter'])->default('new');
            $table->enum('status',['active','inactive'])->default('active');
            $table->string('added_by')->nullable();
            $table->boolean('is_featured')->default(0)->nullable();
            $table->string('url')->nullable();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('CASCADE');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('CASCADE');
            $table->foreign('child_cat_id')->references('id')->on('categories')->onDelete('SET NULL');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
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

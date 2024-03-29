<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->mediumText('description')->nullable();
            $table->string('photo');
            $table->integer('percent')->nullable();
            $table->enum('is_active', ['ON', 'OFF'])->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->enum('condition', ['banner', 'promo'])->default('banner');
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
        Schema::dropIfExists('banners');
    }
}

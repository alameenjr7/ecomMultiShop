<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_number', 10)->unique();
            $table->float('sub_total')->default(0);
            $table->float('total_amount')->default(0);
            $table->float('coupon')->default(0)->nullable();
            $table->integer('delivery_charge')->default(0)->nullable();
            $table->string('payment_method')->default('cod');
            $table->enum('payment_status',['paid','unpaid'])->default('unpaid');
            $table->enum('condition',['pending','processing','delivered','cancelled'])->default('pending');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('country')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('postcode')->nullable();
            $table->string('apartment')->nullable();
            $table->mediumText('note')->nullable();

            $table->string('n_first_name')->nullable();
            $table->string('n_last_name')->nullable();
            $table->string('n_email')->nullable();
            $table->string('n_phone')->nullable();
            $table->string('n_country')->nullable();
            $table->string('n_address')->nullable();
            $table->string('n_city')->nullable();
            $table->string('n_state')->nullable();
            $table->string('n_postcode')->nullable();
            $table->string('n_apartment')->nullable();
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
        Schema::dropIfExists('orders');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('transaction_id');
            $table->string('payment_methods');
            $table->text('note')->nullable();
            $table->decimal('totalPrice',15)->default(0);
            $table->boolean('pending')->default(true);
            $table->boolean('processing')->default(false);
            $table->boolean('delivered')->default(false);
            $table->boolean('canceled')->default(false);
            $table->boolean('refunded')->default(false);
            $table->integer('discount_id')->nullable();
            $table->string('deliveryAddress');
            $table->string('email');
            $table->string('phone_number');
            $table->timestamps();
            $table->softDeletes();
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
};

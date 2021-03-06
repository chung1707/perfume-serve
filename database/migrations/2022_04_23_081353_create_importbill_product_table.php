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
        Schema::create('import_bill_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('import_bill_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('product_id');
            $table->integer('quantity')->default(1);
            $table->decimal('price',13);
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
        Schema::dropIfExists('import_bill_product');
    }
};

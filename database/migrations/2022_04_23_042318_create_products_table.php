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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productCode');
            $table->string('name');
            $table->decimal('price',13)->default(0);
            $table->integer('sold')->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('capacity')->default(100);
            $table->integer('discount')->default(0);
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('supplier_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('product_detail_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('products');
    }
};

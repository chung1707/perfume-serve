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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('concentration');
            $table->integer('release');
            $table->integer('saveIncense');
            $table->integer('age');
            $table->integer('spring')->default(0);
            $table->integer('summer')->default(0);
            $table->integer('fall')->default(0);
            $table->integer('winter')->default(0);
            $table->integer('daytime')->default(0);
            $table->integer('night')->default(0);
            $table->json('fragrant');
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
        Schema::dropIfExists('product_details');
    }
};

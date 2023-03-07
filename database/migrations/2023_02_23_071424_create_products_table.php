<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references("id")->on("categories");
            $table->integer('subcategory_id')->unsigned();
            $table->foreign('subcategory_id')->references("id")->on("subcategories");
            $table->string("pname");
            $table->string("pimage");            
            $table->string("qty");
            $table->string("oldprice");
            $table->string("offerprice");
            $table->string("descriptions");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

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
            $table->id();
            $table->string("name");
            $table->foreignId("brand_id")->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId("user_id");
            $table->double("actual_price");
            $table->double("sale_price");
            $table->double("total_stock")->default(0);
            $table->string("unit");
            $table->text("more_information")->nullable();
            $table->string("photo");
            $table->timestamps();
            $table->softDeletes();
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

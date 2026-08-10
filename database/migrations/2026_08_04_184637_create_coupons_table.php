<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {

            $table->id();

            $table->string('code')->unique();

            // percentage or fixed
            $table->enum('type',['percentage','fixed']);

            // 10 or 500
            $table->decimal('value',10,2);

            // minimum cart amount
            $table->decimal('minimum_amount',10,2)->default(0);

            // maximum discount (for percentage)
            $table->decimal('maximum_discount',10,2)->nullable();

            $table->integer('usage_limit')->nullable();

            $table->integer('used')->default(0);

            $table->date('expiry_date');

            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
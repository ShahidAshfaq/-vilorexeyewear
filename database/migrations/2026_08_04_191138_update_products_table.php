<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            // Rename existing columns
            $table->renameColumn('cut_price', 'sale_price');
            $table->renameColumn('quantity', 'stock');
            $table->renameColumn('category', 'category_id');

            // New columns
            $table->string('sku')->unique()->after('sale_price');
            $table->boolean('status')->default(true)->after('image');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->renameColumn('sale_price', 'cut_price');
            $table->renameColumn('stock', 'quantity');
            $table->renameColumn('category_id', 'category');

            $table->dropColumn([
                'sku',
                'status',
            ]);
        });
    }
};
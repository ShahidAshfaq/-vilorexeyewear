<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->string('frame')->nullable()->after('category_id');
            $table->string('lens')->nullable()->after('frame');
            $table->string('gender')->nullable()->after('lens');
            $table->boolean('on_sale')->default(false)->after('gender');

        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn([
                'frame',
                'lens',
                'gender',
                'on_sale'
            ]);

        });
    }
};
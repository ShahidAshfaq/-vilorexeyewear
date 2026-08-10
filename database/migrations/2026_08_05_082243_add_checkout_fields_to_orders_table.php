<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_method')->default('cod')->after('address');
            $table->string('coupon_code')->nullable()->after('payment_method');
            $table->decimal('discount', 10, 2)->default(0)->after('coupon_code');
            $table->string('order_number')->unique()->after('discount');
            $table->string('session_id')->nullable()->after('user_id');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'payment_method',
                'coupon_code',
                'discount',
                'order_number',
                'session_id'
            ]);
        });
    }
};
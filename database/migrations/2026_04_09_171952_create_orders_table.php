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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('voucher_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('receiver_name');
            $table->string('phone');
            $table->text('address');

            $table->decimal('total_price', 10, 2);
            $table->decimal('discount_amount', 10, 2)
                ->default(0);

            $table->enum('status', [
                'cho_xac_nhan',
                'da_xac_nhan',
                'dang_giao',
                'hoan_thanh',
                'da_huy'
            ])->default('cho_xac_nhan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

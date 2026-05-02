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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique();
            $table->string('name');

            $table->enum('type', ['percent', 'fixed']);

            $table->decimal('value', 10, 2);

            $table->decimal('min_order', 10, 2)
                ->nullable();

            $table->integer('quantity')->default(0);

            $table->date('start_date');
            $table->date('end_date');

            $table->enum('status', ['hien', 'an'])
                ->default('hien');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};

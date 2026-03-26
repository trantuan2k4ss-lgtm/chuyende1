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
        $table->string('name'); // Tên quần áo
        $table->decimal('price', 10, 2); // Giá tiền
        $table->integer('stock'); // Số lượng tồn kho
        $table->timestamps();
    });
}
};

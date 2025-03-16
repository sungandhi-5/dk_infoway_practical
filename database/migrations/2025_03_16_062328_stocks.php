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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id('stock_id');
            $table->string('item_code');
            $table->string('item_name');
            $table->integer('quantity');
            $table->string('location');
            $table->integer('store_id');
            $table->date('in_stock_date');
            $table->boolean('status')->default(config('constant.STOCK_STATUS.OUT_OF_STOCK')); // default: stock is out-of-stock
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
};

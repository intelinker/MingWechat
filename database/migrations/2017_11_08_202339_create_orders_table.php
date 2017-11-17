<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trade_no')->default(0);
            $table->string('order_type')->default(0)->references('id')->on('order_types')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('detail')->nullable();
            $table->string('model')->nullable();
            $table->integer('count')->default(1);
            $table->float('fee')->default(1);
            $table->string('wechat_order')->nullable();
            $table->string('code')->nullable();
            $table->string('media_id')->nullable();
            $table->string('media_url')->nullable();
            $table->string('openid')->default(0)->references('openid')->on('users')->onDelete('cascade');
            $table->string('product_id')->default(0)->references('id')->on('tickets')->onDelete('cascade');
            $table->integer('updated_by')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->integer('created_by')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

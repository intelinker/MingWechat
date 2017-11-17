<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->default(0);
            $table->integer('buyer_id')->default(0)->references('openid')->on('users')->onDelete('cascade');
            $table->integer('seat_id')->default(0)->references('id')->on('seats')->onDelete('cascade');
            $table->integer('line');
            $table->integer('row');
            $table->dateTime('playtime')->nullable();
            $table->float('price')->default(0);
            $table->float('code')->default(0);
            $table->boolean('checked')->default(0);
            $table->boolean('refunded')->default(0);
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}

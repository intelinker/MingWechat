<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->increments('id');
//            $table->integer('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->string('description');
            $table->integer('theatre_id')->references('id')->on('theatres')->default(1);
            $table->boolean('available')->default(1);
            $table->integer('order')->default(0);
            $table->integer('buyer_id')->default(0)->references('openid')->on('users')->onDelete('cascade');
            $table->integer('line');
            $table->integer('row');
            $table->time('playtime')->nullable();
            $table->float('price')->default(0);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seats');
    }
}

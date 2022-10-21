<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;


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
            $table->bigIncrements('id');   
            $table->string('order')->nullable()->default('');
            $table->string('date')->nullable()->default('');
            $table->string('city')->nullable()->default('');
            $table->string('sender')->nullable()->default('');
            $table->string('receiver')->nullable()->default('');
            $table->string('father_name')->nullable()->default('');
            $table->string('cnic')->nullable()->default('');
            $table->double('amount')->nullable()->default(0);
            $table->string('status')->nullable()->default('pending');
            $table->string('user_id')->nullable()->default('');
            $table->string('entry_date')->nullable()->default('');
            $table->timestamps();
            $table->softDeletes();
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

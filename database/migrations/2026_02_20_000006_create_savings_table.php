<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('savings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->unsignedBigInteger('saving_type_id')->nullable();
            $table->decimal('amount', 12, 2)->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('ongoing')->default(false);
            $table->decimal('interest_rate', 5, 2)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('set null');
            $table->foreign('saving_type_id')->references('id')->on('saving_types')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('savings');
    }
};

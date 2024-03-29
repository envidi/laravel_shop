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
        Schema::create('bill',function(Blueprint $table){
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->integer('total');
            $table->string('typeBank');
            $table->string('status');
            $table->string('description');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

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
        //Create Userlist Table in apilaravel database
        Schema::create('userlist', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->nullable();
            $table->string('full_name')->nullable();
            $table->string('phoneno')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userlist');
    }
};

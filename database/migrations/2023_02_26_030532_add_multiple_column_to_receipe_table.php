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
        Schema::table('receipe', function (Blueprint $table) {
            $table->string('user_id')->nullable()->after('id');
            $table->string('ingredients')->nullable()->after('description');
            $table->string('image_url')->nullable()->after('makefavcount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receipe', function (Blueprint $table) {
            $table->dropColumn(['user_id','ingredients','image_url']);
        });
    }
};

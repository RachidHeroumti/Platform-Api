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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->after('remember_token')->default('user');
            $table->boolean('active')->after('role')->default(false);
            $table->text('bio')->nullable()->after('active');
            $table->integer('age')->nullable()->after('bio');
            $table->string('phone')->nullable()->after('age');
            $table->string('image')->nullable()->after('phone');
            $table->string('address')->nullable()->after('image');
            $table->string('country')->nullable()->after('address');
            $table->json('skill')->nullable()->after('country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};

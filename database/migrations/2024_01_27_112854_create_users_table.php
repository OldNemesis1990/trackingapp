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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->nullable()->constrained('profiles');
            $table->string('name');
            $table->date('date_of_birth');
            $table->json('profile_pic_path')->nullable();
            $table->foreignId('phone_brand')->nullable()->constrained('phone_brands');
            $table->foreignId('phone_model')->nullable()->constrained('phone_models');
            $table->string('email')->nullable()->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

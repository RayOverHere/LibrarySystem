<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // PRIMARY KEY
            $table->id();

            $table->string('name');

            // CANDIDATE / ALTERNATE KEY
            $table->string('email')->unique();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // FOREIGN KEY (Links to Books)
            // Meets the project requirement ensuring no table is isolated.
            $table->foreignId('borrowed_book_id')
                ->nullable()
                ->constrained('books')
                ->onDelete('set null');

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
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

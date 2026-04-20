<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            // PRIMARY KEY
            $table->id();

            $table->string('name');
            $table->text('bio')->nullable();
            $table->timestamps();

            // SUPER KEY Example Context:
            // Any combination containing 'id' (e.g., id + name) is a super key.
        });
    }

    public function down():
    {
        Schema::dropIfExists('authors');
    }
};

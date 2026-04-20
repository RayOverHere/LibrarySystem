<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            // PRIMARY KEY
            $table->id();

            // CANDIDATE / ALTERNATE KEY
            // ISBN is unique and could be a primary key, but we use 'id' instead.
            $table->string('isbn')->unique();

            $table->string('title');
            $table->integer('publication_year');

            // FOREIGN KEY (Links to Authors)
            $table->foreignId('author_id')
                ->constrained('authors')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};

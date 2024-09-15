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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // id INT PRIMARY KEY AUTO_INCREMENT
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // user_id INT FOREIGN KEY
            $table->text('content'); // Konten teks dari postingan
            $table->string('image_url', 255)->nullable(); // URL gambar (opsional)
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

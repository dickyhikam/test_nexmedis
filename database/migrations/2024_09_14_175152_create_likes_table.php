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
        Schema::create('likes', function (Blueprint $table) {
            $table->id(); // id INT PRIMARY KEY AUTO_INCREMENT
            $table->foreignId('post_id')->constrained()->onDelete('cascade'); // post_id INT FOREIGN KEY
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // user_id INT FOREIGN KEY
            $table->timestamps(); // created_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};

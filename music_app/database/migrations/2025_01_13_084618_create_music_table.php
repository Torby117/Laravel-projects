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
        Schema::create('music', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('album')->nullable();
            $table->string('artist')->nullable();
            $table->decimal('price', 8, 2)->nullable(); // NULL = Free
            $table->string('file_path'); // Path to uploaded MP3 file
            $table->timestamps();
        });
        
    }

    /**
     * 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music');
    }
};

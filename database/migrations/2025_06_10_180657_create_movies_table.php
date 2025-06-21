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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();       
            $table->string('title');               
            $table->string('country')->nullable();  
            $table->string('language')->nullable(); 
            $table->string('year')->nullable();   
            $table->unsignedBigInteger('downloads')->default(0);
            $table->text('description')->nullable();
            $table->string('file_id');             
            $table->integer('message_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};

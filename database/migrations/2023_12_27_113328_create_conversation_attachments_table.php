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
        Schema::create('conversation_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conversation_message_id');
            $table->string('file_path');
            $table->string('file_name');
            $table->string('file_type');
            $table->timestamps();   

            // Foreign key constraints
            $table->foreign('conversation_message_id')->references('id')->on('conversation_messages')->onDelete('cascade');
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversation_attachments');
    }
};

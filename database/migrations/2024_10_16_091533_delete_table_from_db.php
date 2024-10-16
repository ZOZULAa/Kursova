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
        Schema::dropIfExists('drugs');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('drug_content');
            $table->string('image')->nullable();
            $table->boolean('is_published')->default(1);
            $table->timestamps();

            $table->softDeletes();
        });
    }
};

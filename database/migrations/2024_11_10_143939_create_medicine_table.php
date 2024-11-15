<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    


    public function up(): void
    {
        Schema::create('medicine', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('medicine_content');
            $table->float('price');
            $table->integer('count');
            $table->string('image')->nullable();
            $table->boolean('is_published')->default(1);
            $table->timestamps();

            $table->softDeletes();

            $table->unsignedBigInteger('category_id')->nullable();

            $table->index('category_id', 'medicine_category_idx');

            $table->foreign('category_id', 'medicine_category_fk')->on('categories')->references('id');
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('medicine');
    }
};

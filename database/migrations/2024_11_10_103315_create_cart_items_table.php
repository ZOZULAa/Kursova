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
        $tableName = config('laravel-cart.cart_items.table', 'cart_items');
        $cartForeignName = config('laravel-cart.carts.foreign_id', 'cart_id');
        $cartTableName = config('laravel-cart.carts.table', 'carts');

        if (!Schema::hasTable($tableName)) {
            Schema::create($tableName, function (Blueprint $table) use ($cartForeignName, $cartTableName) {
                $table->id();

                if (Schema::hasTable($cartTableName)) {
                    $table->foreignId($cartForeignName)->constrained($cartTableName)->cascadeOnDelete();
                } else {
                    $table->unsignedBigInteger($cartForeignName);
                }

                $table->morphs('itemable');
                $table->unsignedInteger('quantity')->default(1);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tableName = config('laravel-cart.cart_items.table', 'cart_items');
        
        if (Schema::hasTable($tableName)) {
            Schema::dropIfExists($tableName);
        }
    }
};

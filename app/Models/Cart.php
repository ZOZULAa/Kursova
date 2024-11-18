<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    /**
     * Відношення: Кошик має багато товарів.
     */
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Відношення: Кошик належить користувачу.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Додавання товару в кошик.
     */
    public function addItem($item, $quantity = 1)
    {
        $this->items()->updateOrCreate(
            ['itemable_id' => $item->id, 'itemable_type' => get_class($item)],
            ['quantity' => $quantity]
        );
    }

    /**
     * Очищення кошика.
     */
    public function emptyCart()
    {
        $this->items()->delete();
    }
}

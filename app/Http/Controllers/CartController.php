<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Binafy\LaravelCart\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        // Отримуємо кошик для автентифікованого користувача
        $cart = Cart::query()->where('user_id', auth()->id())->with('items.itemable')->first();

        // Якщо кошика немає, створюємо його
        if (!$cart) {
            $cart = Cart::query()->create(['user_id' => auth()->id()]);
        }

        return view('cart.index', ['cartItems' => $cart->items]);
    }

    public function add(Request $request)
{
    $request->validate([
        'item_id' => 'required|exists:medicines,id', // Перевірка наявності товару
        'quantity' => 'required|integer|min:1|max:100', // Перевірка кількості
    ]);

    $item = \App\Models\Medicine::findOrFail($request->item_id);
    $cart = Cart::query()->firstOrCreate(['user_id' => auth()->id()]);

    // Додати товар до кошика з кількістю
    $cart->storeItem($item, $request->quantity);

    return redirect()->route('cart.index')->with('success', 'Товар додано до кошика.');
}

public function storeItem($item, $quantity = 1)
{
    // Якщо товар вже є в кошику, збільшити кількість
    $existingItem = $this->items()->where('itemable_id', $item->id)->first();

    if ($existingItem) {
        $existingItem->quantity += $quantity;
        $existingItem->save();
    } else {
        // Додаємо новий товар до кошика
        $this->items()->create([
            'itemable_id' => $item->id,
            'itemable_type' => get_class($item),
            'quantity' => $quantity,
        ]);
    }
}


    public function remove(Request $request)
    {
        $item = \App\Models\Medicine::findOrFail($request->item_id);
        $cart = Cart::query()->where('user_id', auth()->id())->first();

        if ($cart) {
            $cart->removeItem($item);
        }

        return redirect()->route('cart.index')->with('success', 'Товар видалено з кошика.');
    }

    public function clear()
    {
        $cart = Cart::query()->where('user_id', auth()->id())->first();

        if ($cart) {
            $cart->emptyCart();
        }

        return redirect()->route('cart.index')->with('success', 'Кошик очищено.');
    }
}

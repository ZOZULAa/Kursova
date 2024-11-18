<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderItem;
use Binafy\LaravelCart\LaravelCart;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->with('items')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
{
    $cart = Cart::where('user_id', auth()->id())->first();

    if (!$cart) {
        return redirect()->route('cart.index')->with('error', 'Кошик порожній.');
    }

    $cartItems = $cart->items;

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Кошик порожній.');
    }

    $order = Order::create(['user_id' => auth()->id()]);

    foreach ($cartItems as $cartItem) {
        $order->items()->create([
            'itemable_id' => $cartItem->itemable_id,
            'itemable_type' => $cartItem->itemable_type,
            'quantity' => $cartItem->quantity,
        ]);
    }

    LaravelCart::driver('database')->emptyCart(auth()->id());

    return redirect()->route('orders.index')->with('success', 'Замовлення створено.');
}

}

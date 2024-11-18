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
public function show($orderId)
    {
        $order = Order::with('items.itemable') 
                        ->where('id', $orderId)
                        ->firstOrFail(); 

        return view('orders.show', compact('order'));
    }
    public function cancel($orderId)
    {
        $order = Order::where('id', $orderId)
                    ->where('user_id', auth()->id()) // Переконуємося, що це замовлення належить користувачеві
                    ->with('items')
                    ->firstOrFail();

        $order->items()->delete();

        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Замовлення успішно скасовано.');
    }

}

<?php
// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'delivery_address' => 'required|string',
            'notes' => 'nullable|string'
        ]);

        $totalAmount = 0;
        $orderItems = [];

        foreach ($validated['items'] as $item) {
            $product = Product::find($item['product_id']);

            if ($product->stock < $item['quantity']) {
                return back()->withErrors(['stock' => "Stok {$product->name} tidak mencukupi"]);
            }

            $itemTotal = $product->price * $item['quantity'];
            $totalAmount += $itemTotal;

            $orderItems[] = [
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'price' => $product->price,
                'total' => $itemTotal
            ];
        }

        $order = Order::create([
            'order_number' => 'ORD-' . Str::random(8),
            'buyer_id' => auth()->id(),
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'payment_status' => 'pending',
            'delivery_address' => $validated['delivery_address'],
            'notes' => $validated['notes'] ?? null
        ]);

        foreach ($orderItems as $item) {
            $order->items()->create($item);

            // Kurangi stok produk
            Product::find($item['product_id'])->decrement('stock', $item['quantity']);
        }

        return redirect()->route('orders.show', $order)
            ->with('success', 'Pesanan berhasil dibuat');
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);

        $order->load(['items.product', 'buyer']);

        return view('orders.show', compact('order'));
    }
}

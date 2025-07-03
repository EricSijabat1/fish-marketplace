<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    /**
     * Menampilkan daftar produk milik seller yang sedang login.
     */
    public function products()
    {
        $seller = Auth::user();
        $products = $seller->products()->latest()->paginate(10);

        return view('seller.products.index', compact('products'));
    }

    /**
     * Menampilkan daftar pesanan yang masuk untuk produk milik seller.
     */
    public function orders()
    {
        $sellerId = Auth::id();

        // Ambil pesanan yang item-nya mengandung produk dari seller ini.
        $orders = Order::whereHas('items.product', function ($query) use ($sellerId) {
            $query->where('seller_id', $sellerId);
        })
            ->with(['buyer', 'items.product']) // Eager load relasi untuk efisiensi
            ->latest()
            ->paginate(15);

        return view('seller.orders.index', compact('orders'));
    }
}

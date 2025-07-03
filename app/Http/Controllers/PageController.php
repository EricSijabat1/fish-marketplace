<?php

namespace App\Http\Controllers;

use App\Models\Product; // <-- Tambahkan ini
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Menampilkan halaman landing page (home).
     */
    public function home()
    {
        // Ambil 4 produk terbaru sebagai produk unggulan
        $featuredProducts = Product::where('is_active', true)
            ->latest()
            ->take(4)
            ->get();

        return view('welcome', compact('featuredProducts'));
    }
}

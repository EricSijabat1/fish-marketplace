{{-- resources/views/products/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Produk Ikan Segar')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Ikan Segar Danau Toba</h1>
    
    {{-- Search dan Filter --}}
    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <form method="GET" class="flex-1">
            <input type="text" name="search" value="{{ request('search') }}" 
                   placeholder="Cari ikan..." 
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </form>
        
        <select name="category" onchange="this.form.submit()" class="px-4 py-2 border rounded-lg">
            <option value="">Semua Kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category->slug }}" 
                        {{ request('category') == $category->slug ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

{{-- Grid Produk --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @forelse($products as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="aspect-w-16 aspect-h-9">
                @if($product->image)
                    <img src="{{ Storage::url($product->image) }}" 
                         alt="{{ $product->name }}"
                         class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">🐟</span>
                    </div>
                @endif
            </div>
            
            <div class="p-4">
                <h3 class="font-semibold text-lg mb-2">{{ $product->name }}</h3>
                <p class="text-gray-600 text-sm mb-2">{{ Str::limit($product->description, 80) }}</p>
                
                <div class="flex items-center justify-between mb-3">
                    <span class="text-2xl font-bold text-blue-600">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                    <span class="text-sm text-gray-500">per {{ $product->unit }}</span>
                </div>
                
                <div class="flex items-center justify-between mb-3">
                    <span class="text-sm text-green-600">{{ $product->freshness_level_text }}</span>
                    <span class="text-sm text-gray-500">Stok: {{ $product->stock }}</span>
                </div>
                
                <div class="text-xs text-gray-500 mb-3">
                    <p>📍 {{ $product->catch_location }}</p>
                    <p>📅 {{ $product->catch_date->format('d/m/Y') }}</p>
                </div>
                
                <a href="{{ route('products.show', $product) }}" 
                   class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors block text-center">
                    Lihat Detail
                </a>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12">
            <p class="text-gray-500 text-lg">Belum ada produk yang tersedia.</p>
        </div>
    @endforelse
</div>

{{-- Pagination --}}
<div class="mt-8">
    {{ $products->links() }}
</div>
@endsection
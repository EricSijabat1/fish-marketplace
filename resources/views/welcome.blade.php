@extends('layouts.app')

@section('title', 'FreshCatch - Ikan Segar Langsung dari Nelayan')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    :root {
        --primary-blue: #0066CC;
        --ocean-blue: #00498C;
        --light-blue: #E6F3FF;
        --accent-orange: #FF6B35;
        --text-dark: #1A202C;
        --text-gray: #4A5568;
        --background-light: #F7FAFC;
        --white: #FFFFFF;
        --shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        --shadow-hover: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', sans-serif;
        line-height: 1.6;
        color: var(--text-dark);
        background-color: var(--white);
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        height: 100vh;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--ocean-blue) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://images.unsplash.com/photo-1623598122059-9b5ef17619c8?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') center/cover;
        opacity: 0.2;
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: var(--white);
        max-width: 800px;
        padding: 0 20px;
        animation: fadeInUp 1s ease-out;
    }

    .hero-title {
        font-size: 4rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .hero-subtitle {
        font-size: 1.5rem;
        font-weight: 300;
        margin-bottom: 2rem;
        opacity: 0.9;
    }

    .hero-cta {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: var(--accent-orange);
        color: var(--white);
        padding: 16px 32px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: var(--shadow);
    }

    .hero-cta:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-hover);
        background: #e55a2b;
        color: var(--white);
        text-decoration: none;
    }

    /* Wave Animation */
    .wave {
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 100%;
        height: 100px;
        background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120'%3E%3Cpath d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' fill='%23ffffff'/%3E%3C/svg%3E") repeat-x;
        animation: wave 10s linear infinite;
    }

    @keyframes wave {
        0% { background-position-x: 0; }
        100% { background-position-x: 1200px; }
    }

    /* Container */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Section Styles */
    .section {
        padding: 80px 0;
    }

    .section-title {
        text-align: center;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 3rem;
        color: var(--text-dark);
        position: relative;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-blue), var(--accent-orange));
        border-radius: 2px;
    }

    /* Product Grid */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        margin-top: 50px;
    }

    .product-card {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: all 0.3s ease;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-hover);
    }

    .product-image {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.05);
    }

    .product-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--accent-orange);
        color: var(--white);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .product-image-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        background: linear-gradient(135deg, var(--light-blue) 0%, #cce7ff 100%);
        font-size: 3rem;
        color: var(--primary-blue);
    }

    .product-info {
        padding: 25px;
    }

    .product-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--text-dark);
    }

    .product-stock {
        color: var(--text-gray);
        font-size: 0.9rem;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .product-price {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-blue);
        margin-bottom: 20px;
    }

    .product-btn {
        width: 100%;
        background: var(--text-dark);
        color: var(--white);
        padding: 12px 20px;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        transition: all 0.3s ease;
    }

    .product-btn:hover {
        background: var(--primary-blue);
        color: var(--white);
        text-decoration: none;
        transform: translateY(-2px);
    }

    /* Features Section */
    .features-section {
        background: var(--background-light);
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 40px;
        margin-top: 50px;
    }

    .feature-card {
        text-align: center;
        padding: 40px 20px;
        background: var(--white);
        border-radius: 20px;
        box-shadow: var(--shadow);
        transition: all 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
    }

    .feature-icon {
        font-size: 3.5rem;
        color: var(--primary-blue);
        margin-bottom: 20px;
        display: block;
    }

    .feature-title {
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 15px;
        color: var(--text-dark);
    }

    .feature-description {
        color: var(--text-gray);
        line-height: 1.6;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: var(--text-gray);
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 20px;
        color: var(--primary-blue);
        opacity: 0.5;
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in-up {
        animation: fadeInUp 0.8s ease-out;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
        
        .product-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .features-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }

    @media (max-width: 480px) {
        .hero-title {
            font-size: 2rem;
        }
        
        .hero-subtitle {
            font-size: 1rem;
        }
        
        .container {
            padding: 0 15px;
        }
    }
</style>
@endsection

@section('content')
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">FreshCatch</h1>
            <p class="hero-subtitle">Ikan Segar Berkualitas Premium Langsung dari Nelayan Terpercaya</p>
            <a href="{{ route('products.index') }}" class="hero-cta">
                <i class="fas fa-shopping-cart"></i>
                Belanja Sekarang
            </a>
        </div>
        <div class="wave"></div>
    </div>

    <!-- Featured Products Section -->
    <div class="section">
        <div class="container">
            <h2 class="section-title fade-in-up">Produk Pilihan Terbaik</h2>
            
            @if($featuredProducts->count() > 0)
                <div class="product-grid">
                    @foreach($featuredProducts as $product)
                        <div class="product-card fade-in-up">
                            <div class="product-image">
                                @if ($product->image)
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                                @else
                                    <div class="product-image-placeholder">
                                        <i class="fas fa-fish"></i>
                                    </div>
                                @endif
                                <div class="product-badge">Fresh</div>
                            </div>
                            
                            <div class="product-info">
                                <h3 class="product-title">{{ $product->name }}</h3>
                                <div class="product-stock">
                                    <i class="fas fa-box"></i>
                                    Stok: {{ $product->stock }} {{ $product->unit }}
                                </div>
                                <div class="product-price">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>
                                <a href="{{ route('products.show', $product) }}" class="product-btn">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-fish"></i>
                    <h3>Produk Segera Hadir</h3>
                    <p>Kami sedang mempersiapkan produk-produk segar terbaik untuk Anda</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Features Section -->
    <div class="section features-section">
        <div class="container">
            <h2 class="section-title fade-in-up">Mengapa Memilih FreshCatch?</h2>
            
            <div class="features-grid">
                <div class="feature-card fade-in-up">
                    <i class="fas fa-anchor feature-icon"></i>
                    <h3 class="feature-title">Langsung dari Nelayan</h3>
                    <p class="feature-description">
                        Kami bermitra langsung dengan nelayan lokal untuk memastikan ikan yang Anda beli adalah hasil tangkapan hari yang sama, menjamin kesegaran maksimal.
                    </p>
                </div>
                
                <div class="feature-card fade-in-up">
                    <i class="fas fa-medal feature-icon"></i>
                    <h3 class="feature-title">Kualitas Premium</h3>
                    <p class="feature-description">
                        Setiap ikan melewati proses seleksi ketat dan standar kualitas tinggi untuk memastikan hanya yang terbaik yang sampai ke meja Anda.
                    </p>
                </div>
                
                <div class="feature-card fade-in-up">
                    <i class="fas fa-handshake feature-icon"></i>
                    <h3 class="feature-title">Dukung Ekonomi Lokal</h3>
                    <p class="feature-description">
                        Setiap pembelian Anda berkontribusi langsung pada kesejahteraan nelayan dan komunitas lokal, membangun ekonomi yang berkelanjutan.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Smooth scrolling and animations
        document.addEventListener('DOMContentLoaded', function() {
            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all fade-in-up elements
            document.querySelectorAll('.fade-in-up').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(el);
            });

            // Smooth scroll for CTA button
            document.querySelector('.hero-cta').addEventListener('click', function(e) {
                e.preventDefault();
                const targetUrl = this.getAttribute('href');
                window.location.href = targetUrl;
            });
        });
    </script>
@endsection
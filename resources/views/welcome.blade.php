<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Code By Hasnan') }} - Web Developer & IT Consultant</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <meta name="theme-color" content="#2563eb">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        [x-cloak] { display: none !important; }
        
        /* Modern Gradient Text */
        .text-gradient {
            background: linear-gradient(135deg, #2563EB 0%, #4F46E5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Abstract Background Pattern */
        .bg-grid-pattern {
            background-image: linear-gradient(to right, #f1f5f9 1px, transparent 1px),
                              linear-gradient(to bottom, #f1f5f9 1px, transparent 1px);
            background-size: 40px 40px;
        }

        /* Infinite Marquee Animation */
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-scroll {
            animation: scroll 25s linear infinite;
        }
        
        /* Floating Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-white text-slate-800 font-sans antialiased selection:bg-blue-600 selection:text-white overflow-x-hidden">

    <div class="fixed inset-0 bg-grid-pattern -z-50 opacity-60 pointer-events-none"></div>
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-blue-100/40 blur-[100px] rounded-full -z-40 pointer-events-none"></div>

    {{-- ================= NAVBAR (Glass Effect) ================= --}}
    <nav x-data="{ open: false, scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20)"
         :class="{'bg-white/70 backdrop-blur-lg border-b border-slate-200/50 shadow-sm': scrolled, 'bg-transparent border-transparent': !scrolled}"
         class="fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                {{-- Logo --}}
                <a href="#" class="flex items-center gap-3 group">
                    <div class="w-14   flex rounded-md items-center justify-center text-white font-bold text-lg g shadow-blue-500/30 group-hover:scale-105 transition duration-300">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </div>
                    <span class="font-bold text-xl tracking-tight text-slate-900">CodeByHasnan</span>
                </a>

                {{-- Desktop Menu --}}
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#about" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Tentang</a>
                    <a href="#layanan" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Layanan</a>
                    <a href="#kontak" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Kontak</a>
                </div>

                {{-- CTA Button --}}
                <div class="hidden md:flex items-center gap-3">
                <a href="#kontak" class="px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-full hover:bg-blue-700 transition shadow-lg shadow-blue-500/25">Konsultasi</a>
                </div>

                {{-- Mobile Menu Button --}}
                <button @click="open = !open" class="md:hidden p-2 text-slate-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>

        {{-- Mobile Dropdown --}}
        <div x-show="open" @click.outside="open = false" x-transition 
        class="md:hidden absolute top-20 left-0 w-full bg-white border-b border-slate-100 shadow-xl p-4 flex flex-col gap-4">
            <a href="#about" class="block px-4 py-2 font-medium text-slate-700 hover:bg-slate-50 rounded-lg">Tentang</a>
            <a href="#layanan" class="block px-4 py-2 font-medium text-slate-700 hover:bg-slate-50 rounded-lg">Layanan</a>
            <a href="#kontak" class="block px-4 py-2 font-medium text-slate-700 hover:bg-slate-50 rounded-lg">Kontak</a>
            <hr class="border-slate-100">
        </div>
    </nav>

    {{-- ================= HERO SECTION ================= --}}
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col items-center text-center">
                
                {{-- Badge --}}
                {{-- <div data-aos="fade-down" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 border border-blue-100 text-blue-600 mb-8">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    <span class="text-xs font-bold uppercase tracking-widest">Available for Freelance</span>
                </div> --}}

                {{-- Headline --}}
                <h1 data-aos="fade-up" data-aos-delay="100" class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-slate-900 tracking-tight mb-6 leading-[1.1]">
                    Ubah Ide Menjadi <br>
                    <span class="text-gradient">Realitas Digital</span>
                </h1>

                {{-- Subheadline --}}
                <p data-aos="fade-up" data-aos-delay="200" class="text-lg md:text-xl text-slate-500 mb-10 max-w-2xl leading-relaxed">
                    Saya membantu bisnis dan perorangan membangun Website, Sistem Informasi, dan Aplikasi Web yang <strong>Cepat, Aman, dan Modern</strong>.
                </p>

                {{-- Buttons --}}
                <div data-aos="fade-up" data-aos-delay="300" class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                    <a href="#layanan" class="px-8 py-4 bg-slate-900 text-white font-bold rounded-full hover:bg-slate-800 hover:-translate-y-1 transition shadow-xl shadow-slate-900/20">
                        Lihat Layanan
                    </a>
                    <a href="#about" class="px-8 py-4 bg-white text-slate-700 font-bold border border-slate-200 rounded-full hover:border-blue-300 hover:text-blue-600 transition flex items-center justify-center gap-2">
                        <span>Tentang Saya</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                </div>

                {{-- Mockup Illustration (Floating) --}}
                <div data-aos="zoom-in" data-aos-delay="500" class="mt-20 relative w-full max-w-5xl animate-float">
                    <div class="relative rounded-2xl bg-slate-900/5 p-2 sm:p-4 ring-1 ring-slate-900/10 shadow-2xl backdrop-blur-sm">
                        {{-- Ganti src ini dengan screenshot projek terbaikmu --}}
                        <img src="https://images.unsplash.com/photo-1661956602116-aa6865609028?ixlib=rb-4.0.3&auto=format&fit=crop&w=1664&q=80" 
                             alt="App Screenshot" 
                             class="rounded-xl shadow-lg w-full h-auto border border-slate-200/50">
                    </div>
                    
                    {{-- Decorative Blurs --}}
                    <div class="absolute -top-20 -right-20 w-64 h-64 bg-indigo-500 rounded-full blur-[80px] opacity-20 -z-10"></div>
                    <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-blue-500 rounded-full blur-[80px] opacity-20 -z-10"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="skill" class="py-10 border-y border-slate-100 bg-white/50 backdrop-blur-sm overflow-hidden">
        <p class="text-center text-xs font-bold text-slate-400 uppercase tracking-widest mb-8">Teknologi yang Saya Gunakan</p>
        
        <div class="relative w-full overflow-hidden">
            {{-- Durasi diperlambat ke 35s karena item lebih banyak --}}
            <div class="flex whitespace-nowrap animate-scroll gap-16 items-center" style="animation-duration: 25s;">
                {{-- Loop digandakan agar marquee seamless --}}
                @for ($i = 0; $i < 2; $i++)
                    <div class="flex gap-16 items-center opacity-60 grayscale hover:grayscale-0 hover:opacity-100 transition duration-500">
                        
                        {{-- Backend & Core --}}
                        <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-laravel-plain text-red-600"></i> Laravel</span>
                        <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-php-plain text-indigo-500"></i> PHP</span>
                        
                        {{-- Frontend Web --}}
                        <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-html5-plain text-orange-600"></i> HTML</span>
                        <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-css3-plain text-blue-600"></i> CSS</span>
                        <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-javascript-plain text-yellow-400"></i> JavaScript</span>
                        <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-tailwindcss-original text-cyan-400"></i> Tailwind</span>
                        
                        {{-- Database --}}
                        <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-mysql-plain text-blue-600"></i> MySQL</span>
                        
                        {{-- Mobile --}}
                        <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-flutter-plain text-blue-400"></i> Flutter</span>
                        <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-dart-plain text-cyan-500"></i> Dart</span>
                        
                        {{-- Tools & Others --}}
                        <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-git-plain text-red-500"></i> Git</span>
                        <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-github-original text-slate-800"></i> GitHub</span>
                        <span class="text-2xl font-bold flex items-center gap-2">
                            {{-- Icon SVG manual untuk REST API karena tidak ada di devicon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            REST API
                        </span>
                        <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-linux-plain text-black"></i> Linux</span>

                    </div>
                @endfor
            </div>
            
            {{-- Fade Edges --}}
            <div class="absolute top-0 left-0 w-32 h-full bg-gradient-to-r from-white to-transparent z-10"></div>
            <div class="absolute top-0 right-0 w-32 h-full bg-gradient-to-l from-white to-transparent z-10"></div>
        </div>
        
        {{-- Load DevIcons CSS --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
    </section>

    {{-- ================= ABOUT & STATS ================= --}}
    <section id="about" class="py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            
            <div data-aos="fade-right">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-6">Bukan Sekadar Koding, <br>Tapi Solusi.</h2>
                <div class="prose prose-lg text-slate-500">
                    <p>
                        Halo, saya <strong>Hasnan Ali</strong>. Saya percaya website yang hebat adalah perpaduan antara logika kode yang kuat dan desain antarmuka yang intuitif.
                    </p>
                    <p>
                        Berpengalaman dalam membangun berbagai sistem kompleks mulai dari <strong>Sistem Informasi Manajemen, Aplikasi Keuangan, hingga Landing Page</strong> untuk UMKM. Fokus saya adalah memberikan kode yang bersih, mudah dikelola (maintainable), dan aman.
                    </p>
                </div>

                <div class="mt-8 grid grid-cols-2 gap-6">
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <div class="text-3xl font-bold text-blue-600 mb-1">10+</div>
                        <div class="text-sm font-medium text-slate-600">Projek Selesai</div>
                    </div>
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <div class="text-3xl font-bold text-indigo-600 mb-1">100%</div>
                        <div class="text-sm font-medium text-slate-600">Client Satisfaction</div>
                    </div>
                </div>
            </div>

            <div data-aos="fade-left" class="relative">
                <div class="absolute inset-0 bg-gradient-to-tr from-blue-600 to-purple-600 rounded-[2rem] rotate-3 opacity-20 blur-lg"></div>
                <div class="relative bg-white rounded-[2rem] p-8 border border-slate-100 shadow-2xl">
                    <h3 class="font-bold text-xl mb-6">Mengapa Memilih Jasa Saya?</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <strong class="text-slate-900">Best Practice Coding</strong>
                                <p class="text-sm text-slate-500">Struktur kode rapi, standar industri, mudah dikembangkan.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <div>
                                <strong class="text-slate-900">Performa Tinggi</strong>
                                <p class="text-sm text-slate-500">Optimasi database dan aset agar website loading cepat.</p>
                            </div>
                        </li>
                        {{-- <li class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <div>
                                <strong class="text-slate-900">Keamanan Terjamin</strong>
                                <p class="text-sm text-slate-500">Proteksi dari serangan umum (SQL Injection, XSS, CSRF).</p>
                            </div>
                        </li> --}}
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            </div>
                            <div>
                                <strong class="text-slate-900">Pengerjaan Cepat</strong>
                                <p class="text-sm text-slate-500">
                                    Proses pengembangan efisien dengan estimasi waktu jelas dan terukur.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </section>

    {{-- ================= SERVICES (BENTO GRID) ================= --}}
    <section id="layanan" class="py-24 bg-slate-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Layanan & Keahlian</h2>
                <p class="text-slate-500">Apa yang bisa saya bangun untuk bisnis Anda?</p>
            </div>

            {{-- Bento Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                {{-- Card 1: Large Left --}}
                <div data-aos="fade-up" class="md:col-span-2 bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-xl transition duration-300 group">
                    <div class="h-12 w-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-6 group-hover:scale-110 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-2">Sistem Informasi Custom</h3>
                    <p class="text-slate-500 mb-4">Membangun sistem kompleks sesuai alur bisnis Anda. Mulai dari ERP sederhana, Sistem HR, Penggajian, hingga Manajemen Sekolah.</p>
                    <ul class="flex flex-wrap gap-2">
                        <li class="px-3 py-1 bg-slate-100 rounded-full text-xs font-semibold text-slate-600">Dashboard Admin</li>
                        <li class="px-3 py-1 bg-slate-100 rounded-full text-xs font-semibold text-slate-600">Export PDF/Excel</li>
                        <li class="px-3 py-1 bg-slate-100 rounded-full text-xs font-semibold text-slate-600">Multi-Role User</li>
                    </ul>
                </div>

                {{-- Card 2: Small Right --}}
                <div data-aos="fade-up" data-aos-delay="100" class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-3xl p-8 shadow-lg text-white group hover:-translate-y-1 transition duration-300">
                    <div class="h-12 w-12 bg-white/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Landing Page</h3>
                    <p class="text-slate-300 text-sm">Website profil perusahaan atau promosi produk yang estetik dan SEO Friendly.</p>
                </div>

                {{-- Card 3: Small Left --}}
                <div data-aos="fade-up" data-aos-delay="200" class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-xl transition duration-300 group hover:-translate-y-1">
                    <div class="h-12 w-12 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Aplikasi Inventory</h3>
                    <p class="text-slate-500 text-sm">Kelola stok barang masuk/keluar dengan akurat. Support barcode scanner.</p>
                </div>

                {{-- Card 4: Large Right --}}
                <div data-aos="fade-up" data-aos-delay="300" class="md:col-span-2 bg-white rounded-3xl p-8 border border-slate-100 shadow-sm hover:shadow-xl transition duration-300 group">
                     <div class="h-12 w-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-6 group-hover:scale-110 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-2">API & Integrasi</h3>
                    <p class="text-slate-500 mb-4">Pembuatan REST API untuk aplikasi mobile (Flutter/Android) atau integrasi Payment Gateway (Midtrans, Xendit).</p>
                    <ul class="flex flex-wrap gap-2">
                        <li class="px-3 py-1 bg-slate-100 rounded-full text-xs font-semibold text-slate-600">Secure Auth (JWT)</li>
                        <li class="px-3 py-1 bg-slate-100 rounded-full text-xs font-semibold text-slate-600">Fast Response</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    {{-- ================= CTA ================= --}}
    <section id="kontak" class="py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-blue-600"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-indigo-800"></div>
        {{-- Abstract Shapes --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl -mr-20 -mt-20"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-white/10 rounded-full blur-3xl -ml-20 -mb-20"></div>

        <div class="max-w-4xl mx-auto px-4 relative z-10 text-center text-white">
            <h2 data-aos="zoom-in" class="text-3xl md:text-5xl font-extrabold mb-8 leading-tight">
                Punya Ide Projek? <br> Mari Kita Bicarakan.
            </h2>
            <p data-aos="fade-up" data-aos-delay="100" class="text-blue-100 text-lg mb-10 max-w-2xl mx-auto">
                Konsultasi gratis. Ceritakan kebutuhan sistem Anda, dan saya akan memberikan solusi teknis terbaik.
            </p>
            <div data-aos="fade-up" data-aos-delay="200" class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="https://wa.me/6285724945467" target="_blank" class="px-8 py-4 bg-white text-blue-700 font-bold rounded-full hover:bg-slate-100 transition shadow-xl flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/></svg>
                    Chat WhatsApp
                </a>
                <a href="mailto:ahasnan32@gmail.com"  target="_blank" class="px-8 py-4 bg-transparent border border-white/30 text-white font-bold rounded-full hover:bg-white/10 transition">
                    Kirim Email
                </a>
            </div>
        </div>
    </section>

    {{-- ================= FOOTER ================= --}}
    <footer class="bg-slate-50 border-t border-slate-200 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-8">
                <div class="flex items-center gap-3">
                    <div class="w-24 flex items-center justify-center text-white font-bold"> 
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </div>
                    <span class="font-bold text-xl text-slate-900">CodeByHasnan</span>
                </div>
                <div class="flex gap-6">
                    <a href="https://github.com/HasnanAlii" target="_blank" class="text-slate-400 hover:text-slate-900 transition"><i class="devicon-github-original text-2xl"></i></a>
                    <a href="https://www.linkedin.com/in/hasnan-ali-705184259/" target="_blank" class="text-slate-400 hover:text-blue-600 transition"><i class="devicon-linkedin-plain text-2xl"></i></a>
                </div>
            </div>
            <div class="text-center md:text-left border-t border-slate-200 pt-8 flex flex-col md:flex-row justify-between text-sm text-slate-500">
                <p>&copy; {{ date('Y') }} Code By Hasnan. All rights reserved.</p>
                <p>Made with <span class="text-red-500">&hearts;</span> using Laravel & Tailwind</p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100,
            easing: 'ease-out-cubic'
        });
    </script>
</body>
</html>

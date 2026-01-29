<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Code By Hasnan') }} - Web Developer & IT Consultant</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <meta name="theme-color" content="#2563eb">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    {{-- Load DevIcons CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">

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
                    <div class="w-14 flex rounded-md items-center justify-center text-white font-bold text-lg shadow-blue-500/30 group-hover:scale-105 transition duration-300">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </div>
                    <span class="font-bold text-xl tracking-tight text-slate-900">CodeByHasnan</span>
                </a>

                {{-- Desktop Menu --}}
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#about" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Tentang</a>
                    <a href="#layanan" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Layanan</a>
                    <a href="#portfolio" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Portofolio</a>
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
            <a href="#portfolio" class="block px-4 py-2 font-medium text-slate-700 hover:bg-slate-50 rounded-lg">Portofolio</a>
            <a href="#kontak" class="block px-4 py-2 font-medium text-slate-700 hover:bg-slate-50 rounded-lg">Kontak</a>
            <hr class="border-slate-100">
        </div>
    </nav>

    {{-- ================= HERO SECTION ================= --}}
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col items-center text-center">
                
                {{-- Headline --}}
                <h1 data-aos="fade-up" data-aos-delay="100" class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-slate-900 tracking-tight mb-6 leading-[1.1]">
                    Code By Hasnan <br>
                    <span class="text-gradient">Jasa Pembuatan Website</span>
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
                    <a href="/portofolio" class="px-8 py-4 bg-white text-slate-700 font-bold border border-slate-200 rounded-full hover:border-blue-300 hover:text-blue-600 transition flex items-center justify-center gap-2">
                        <span>Portofolio Saya</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
       
                </div>

               
            </div>
        </div>
    </section>

    <section id="skill" class="py-10 border-y border-slate-100 bg-white/50 backdrop-blur-sm overflow-hidden">
        <p class="text-center text-xs font-bold text-slate-400 uppercase tracking-widest mb-8">Teknologi yang Saya Gunakan</p>
        
        <div class="relative w-full overflow-hidden py-6">
            <div class="flex whitespace-nowrap animate-scroll gap-16 items-center" style="animation-duration: 35s;">
                @for ($i = 0; $i < 2; $i++)
                <div class="flex gap-16 items-center opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition duration-500">

                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-laravel-plain text-red-600"></i> Laravel</span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-php-plain text-indigo-500"></i> PHP</span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-mysql-plain text-blue-600"></i> MySQL</span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-postgresql-plain text-blue-500"></i> PostgreSQL</span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-javascript-plain text-yellow-400"></i> JavaScript</span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-jquery-plain text-blue-400"></i> jQuery</span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-html5-plain text-orange-600"></i> HTML</span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-tailwindcss-original text-cyan-400"></i> Tailwind</span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-bootstrap-plain text-purple-600"></i> Bootstrap</span>
                    <span class="text-2xl font-bold flex items-center gap-2">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        REST API
                    </span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-flutter-plain text-blue-400"></i> Flutter</span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-dart-plain text-cyan-500"></i> Dart</span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-git-plain text-red-500"></i> Git</span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-github-original text-slate-800"></i> GitHub</span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-nodejs-plain text-green-600"></i> Node.js</span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-nestjs-plain text-red-600"></i> NestJS</span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-mongodb-plain text-green-500"></i> MongoDB</span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-go-original-wordmark text-cyan-600"></i> Golang</span>
                    <span class="text-2xl font-bold flex items-center gap-2"><i class="devicon-vuejs-plain text-green-500"></i> Vue.js</span>

                </div>
                @endfor
            </div>
        </div>

            <div class="absolute top-0 left-0 w-32 h-full bg-gradient-to-r from-white to-transparent z-10"></div>
            <div class="absolute top-0 right-0 w-32 h-full bg-gradient-to-l from-white to-transparent z-10"></div>
        </div>
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

                {{-- INTEGRASI: Statistik Baru --}}
                <div class="flex flex-wrap justify-center md:justify-start gap-8 pt-8">
                    <div class="text-center md:text-left">
                        <p class="text-3xl font-extrabold text-indigo-600 dark:text-indigo-400">
                            2+ <span class="text-base font-semibold align-bottom">Tahun</span>
                        </p>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Pengalaman Coding</p>
                    </div>

                    <div class="text-center md:text-left">
                        <p class="text-3xl font-extrabold text-indigo-600 dark:text-indigo-400">
                            {{ $projek->where('status','selesai')->count() }}+
                        </p>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Projek Selesai</p>
                    </div>
                    <div class="text-center md:text-left">
                        <p class="text-3xl font-extrabold text-indigo-600 dark:text-indigo-400">
                            15+
                        </p>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Tech Stack</p>
                    </div>
                </div>
                {{-- END INTEGRASI --}}
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
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            </div>
                            <div>
                                <strong class="text-slate-900">Pengerjaan Cepat</strong>
                                <p class="text-sm text-slate-500">Proses pengembangan efisien dengan estimasi waktu jelas dan terukur.</p>
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


    <section id="portfolio" class="py-24 bg-slate-50 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 md:px-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6 text-center md:text-left">
            <div data-aos="fade-up">
                <span class="text-indigo-600 font-bold tracking-wider uppercase text-sm">Portofolio</span>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mt-2">Projek Terbaru</h2>
                <p class="mt-4 text-slate-500 max-w-xl mx-auto md:mx-0">
                    Kumpulan projek yang saya kerjakan untuk klien instansi, UMKM, dan tugas akademik.
                </p>
            </div>
            <div class="hidden md:block" data-aos="fade-left">
                <a href="#kontak" class="text-indigo-600 font-semibold hover:text-indigo-800 flex items-center gap-2">
                    Mulai Projek Bersama <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projek as $item)
            @php
                $images = $item->media->map(fn($m) => asset('storage/'.$m->foto))->toArray();
                if(empty($images)) { $images = ['https://placehold.co/800x600?text=No+Image']; }
            @endphp

            <div x-data="{ 
                openModal: false, 
                currentIndex: 0, 
                images: {{ json_encode($images) }},
                next() { this.currentIndex = (this.currentIndex + 1) % this.images.length },
                prev() { this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length }
            }" class="h-full" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                
                <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100 overflow-hidden flex flex-col h-full">
                    <div class="h-56 bg-slate-200 overflow-hidden relative cursor-pointer" @click="openModal = true">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition z-10"></div>
                        <img src="{{ $images[0] }}" alt="{{ $item->nama }}" class="w-full h-full object-cover">
                        <div class="absolute top-4 right-4 z-20">
                            <span class="px-3 py-1 text-xs font-bold rounded-full shadow-sm backdrop-blur-md
                                {{ $item->status == 'selesai' ? 'bg-green-500 text-white' : ($item->status == 'proses' ? 'bg-yellow-400 text-yellow-900' : 'bg-slate-500 text-white') }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </div>
                        @if(count($images) > 1)
                        <div class="absolute bottom-3 right-3 z-20 bg-black/60 text-white text-[10px] px-2 py-1 rounded-md">
                            +{{ count($images) - 1 }} Gambar
                        </div>
                        @endif
                    </div>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <span class="text-xs font-bold text-indigo-600 uppercase mb-2">{{ $item->jenis }}</span>
                        <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-indigo-600 transition cursor-pointer" @click="openModal = true">
                            {{ $item->nama }}
                        </h3>
                        <p class="text-slate-600 text-sm mb-6 line-clamp-3 leading-relaxed">
                            {{ $item->deskripsi }}
                        </p>
                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between mt-auto">
                            <div class="flex items-center gap-2 text-sm text-slate-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="truncate max-w-[120px]">{{ $item->nama_customer }}</span>
                            </div>
                            <button @click="openModal = true" class="text-sm font-semibold text-indigo-600 flex items-center gap-1">
                                Detail
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                 <template x-teleport="body">
                    <div x-show="openModal" 
                        class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-900/90 backdrop-blur-sm"
                        x-transition.opacity>
                        
                        <div @click.outside="openModal = false" 
                            class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl max-h-[90vh] overflow-y-auto border border-slate-200">
                            
                            <!-- Image Slider -->
                            <div class="relative h-72 md:h-96 bg-slate-100">
                                <button @click="openModal = false" 
                                    class="absolute top-4 right-4 bg-black/60 hover:bg-black text-white p-2 rounded-full transition z-30">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>

                                <img :src="images[currentIndex]" class="w-full h-full object-contain transition-all duration-500">

                                <template x-if="images.length > 1">
                                    <div>
                                        <button @click="prev()" 
                                            class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-white p-3 rounded-full text-slate-700 shadow transition z-20">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                            </svg>
                                        </button>
                                        <button @click="next()" 
                                            class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-white p-3 rounded-full text-slate-700 shadow transition z-20">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </button>

                                        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-20">
                                            <template x-for="(img, index) in images" :key="index">
                                                <button @click="currentIndex = index" 
                                                    :class="currentIndex === index ? 'bg-indigo-600 w-6' : 'bg-indigo-300 w-2'"
                                                    class="h-2 rounded-full transition-all duration-300"></button>
                                            </template>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <!-- Modal Info -->
                            <div class="p-8">
                                <div class="flex items-center gap-3 mb-4">
                                    <span class="px-3 py-1 bg-indigo-50 text-indigo-700 text-xs font-bold uppercase rounded-md">
                                        {{ $item->jenis }}
                                    </span>
                                    <span class="text-slate-400 text-sm">|</span>
                                    <span class="text-sm font-medium text-slate-500">Status: {{ ucfirst($item->status) }}</span>
                                </div>

                                <h3 class="text-3xl font-bold text-slate-900 mb-4">{{ $item->nama }}</h3>
                                
                                <div class="prose prose-slate max-w-none text-slate-600 mb-8">
                                    <p class="whitespace-pre-line">{{ $item->deskripsi }}</p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-slate-50 rounded-xl p-6 border border-slate-100">
                                    <div>
                                        <p class="text-xs text-slate-400 uppercase font-bold tracking-wider">Klien / Instansi</p>
                                        <p class="font-semibold text-slate-700">{{ $item->nama_customer }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-slate-400 uppercase font-bold tracking-wider">Teknologi</p>
                                        <p class="font-semibold text-slate-700">Laravel, Tailwind, MySQL</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

            </div>
            @empty
            <div class="col-span-full flex flex-col items-center justify-center py-20 text-center">
                <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mb-4 text-slate-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-slate-900">Belum ada projek</h3>
                <p class="text-slate-500 max-w-sm mt-2">Data portofolio belum ditambahkan ke database.</p>
            </div>
            @endforelse
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
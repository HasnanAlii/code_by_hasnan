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
        [x-cloak] {
            display: none !important;
        }

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
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-scroll {
            animation: scroll 25s linear infinite;
        }

        /* Floating Animation */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>

<body
    class="bg-white text-slate-800 font-sans antialiased selection:bg-blue-600 selection:text-white overflow-x-hidden">

    <div class="fixed inset-0 bg-grid-pattern -z-50 opacity-60 pointer-events-none"></div>
    <div
        class="fixed top-0 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-blue-100/40 blur-[100px] rounded-full -z-40 pointer-events-none">
    </div>

    {{-- ================= NAVBAR (Glass Effect) ================= --}}
    <nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)"
        :class="{
            'bg-white/70 backdrop-blur-lg border-b border-slate-200/50 shadow-sm': scrolled,
            'bg-transparent border-transparent':
                !scrolled
        }"
        class="fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                {{-- Logo --}}
                <a href="#" class="flex items-center gap-2 md:gap-3 group shrink min-w-0 pr-2 md:flex-1">
                    <div
                        class="w-10 h-10 md:w-14 md:h-14 flex shrink-0 rounded-md items-center justify-center text-white font-bold text-lg shadow-blue-500/30 group-hover:scale-105 transition duration-300">
                        <img src="{{ asset('images/logo.png') }}" class="w-full h-full object-contain" alt="CodeByHasnan Logo">
                    </div>
                    <span class="font-bold text-[17px] md:text-xl tracking-tight text-slate-900 truncate">CodeByHasnan</span>
                </a>

                {{-- Desktop Menu --}}
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#about"
                        class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Tentang</a>
                    <a href="#layanan"
                        class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Layanan</a>
                    <a href="/portofolio" target="_blank"
                        class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Portofolio</a>
                    <a href="#kontak"
                        class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Kontak</a>
                </div>

                {{-- CTA Button --}}
                <div class="hidden md:flex items-center gap-3 shrink-0 md:flex-1 md:justify-end">
                    <a href="#kontak"
                        class="px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-full hover:bg-blue-700 transition shadow-lg shadow-blue-500/25">Konsultasi</a>
                </div>

                {{-- Mobile Menu Button --}}
                <button @click="open = !open" class="md:hidden p-2 text-slate-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Dropdown --}}
        <div x-show="open" @click.outside="open = false" x-transition
            class="md:hidden absolute top-20 left-0 w-full bg-white border-b border-slate-100 shadow-xl p-4 flex flex-col gap-4">
            <a href="#about"
                class="block px-4 py-2 font-medium text-slate-700 hover:bg-slate-50 rounded-lg">Tentang</a>
            <a href="#layanan"
                class="block px-4 py-2 font-medium text-slate-700 hover:bg-slate-50 rounded-lg">Layanan</a>
            <a href="/portofolio" target="_blank"
                class="block px-4 py-2 font-medium text-slate-700 hover:bg-slate-50 rounded-lg">Portofolio</a>
            <a href="#kontak" class="block px-4 py-2 font-medium text-slate-700 hover:bg-slate-50 rounded-lg">Kontak</a>
        </div>
    </nav>

    <main class="relative w-full overflow-hidden">

    {{-- ================= HERO SECTION ================= --}}
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col items-center text-center">
                {{-- Status Badge --}}
                <div data-aos="fade-up" data-aos-delay="50" class="mb-8 inline-flex items-center gap-2 px-4 py-2">
                </div>

                {{-- Headline --}}
                <h1 data-aos="fade-up" data-aos-delay="100"
                    class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-slate-900 tracking-tight mb-6 leading-[1.1]">
                    Code By Hasnan <br>
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600">Jasa
                        Pembuatan Website</span>
                </h1>

                {{-- Subheadline --}}
                <p data-aos="fade-up" data-aos-delay="200"
                    class="text-lg md:text-xl text-slate-500 mb-10 max-w-2xl leading-relaxed">
                    Saya membantu bisnis dan perorangan membangun Website, Sistem Informasi, dan Aplikasi Web yang
                    <strong class="text-slate-700">Cepat, Aman, dan Modern</strong>.
                </p>

                {{-- Buttons --}}
                <div data-aos="fade-up" data-aos-delay="300"
                    class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                    <a href="#kontak"
                        class="group w-full sm:w-auto px-8 py-4 bg-slate-900 text-white font-bold rounded-2xl hover:bg-blue-600 hover:shadow-[0_20px_40px_rgba(37,99,235,0.3)] hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                        Konsultasi Sekarang

                    </a>
                    <a href="/portofolio" target="_blank"
                        class="group w-full sm:w-auto px-8 py-4 bg-white text-slate-700 font-bold border border-slate-200 rounded-2xl hover:border-slate-300 hover:bg-slate-50 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2 shadow-sm">
                        <span>Lihat Portofolio</span>
                    </a>
                </div>

                {{-- Trust Badges --}}
                <div data-aos="fade-up" data-aos-delay="400"
                    class="mt-12 flex flex-wrap items-center justify-center gap-4 sm:gap-6 px-6 py-4 bg-white/60 backdrop-blur-md rounded-2xl sm:rounded-full shadow-sm border border-slate-200/60">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-bold text-slate-700">Respons Cepat</span>
                    </div>
                    <div class="w-1.5 h-1.5 rounded-full bg-slate-300 hidden sm:block"></div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                        <span class="text-sm font-bold text-slate-700">Praktik Kode Terbaik</span>
                    </div>
                    <div class="w-1.5 h-1.5 rounded-full bg-slate-300 hidden sm:block"></div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14 15H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2v4"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 19h6M9 15v4"></path>
                            <rect x="15" y="11" width="7" height="10" rx="1.5" ry="1.5"></rect>
                        </svg>
                        <span class="text-sm font-bold text-slate-700">Tampilan Modern</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= KEUNGGULAN ================= --}}
    <section id="challenges" class="py-24 bg-gradient-to-b from-white via-slate-50/80 to-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Keunggulan Jasa Kami</h2>
                <p class="text-slate-500 text-lg">Memberikan nilai lebih pada setiap baris kode yang kami bangun</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16 relative">

                {{-- Card 1: Desain Responsif --}}
                <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-[0_10px_30px_rgb(0,0,0,0.03)] hover:shadow-[0_20px_40px_rgb(37,99,235,0.12)] hover:-translate-y-3 transition-all duration-300 text-start w-full h-full flex flex-col group"
                    data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-start gap-4 mb-4">
                        <div
                            class="w-14 h-14 rounded-2xl bg-[#EEF9FE] text-blue-500 flex items-center justify-center flex-shrink-0 mb-2 shadow-sm border border-blue-100 group-hover:scale-110 group-hover:bg-blue-500 group-hover:text-white transition-all duration-300">
                            <!-- SVG: Desktop/Mobile Responsive -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2">
                                </rect>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 21h8M12 17v4"></path>
                            </svg>
                        </div>
                        <div class="pt-1">
                            <h4
                                class="font-extrabold text-[#111827] text-[18px] mb-2 leading-tight group-hover:text-blue-600 transition-colors">
                                Desain Modern Terkini</h4>
                            <p class="text-[14.5px] text-slate-500 leading-relaxed">
                                Antarmuka website memukau dan 100% responsif. Tampil sempurna di PC, Laptop, dan
                                Smartphone.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Card 2: Keamanan & Performa --}}
                <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-[0_10px_30px_rgb(0,0,0,0.03)] hover:shadow-[0_20px_40px_rgb(37,99,235,0.12)] hover:-translate-y-3 transition-all duration-300 text-start w-full h-full flex flex-col group"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-start gap-4 mb-4">
                        <div
                            class="w-14 h-14 rounded-2xl bg-[#EEF9FE] text-blue-500 flex items-center justify-center flex-shrink-0 mb-2 shadow-sm border border-blue-100 group-hover:scale-110 group-hover:bg-blue-500 group-hover:text-white transition-all duration-300">
                            <!-- SVG: Shield Check -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>
                        <div class="pt-1">
                            <h4
                                class="font-extrabold text-[#111827] text-[18px] mb-2 leading-tight group-hover:text-blue-600 transition-colors">
                                Super Cepat & Aman</h4>
                            <p class="text-[14.5px] text-slate-500 leading-relaxed">
                                Dibangun dengan teknologi teroptimasi menghasilkan <i>loading</i> secepat kilat serta
                                dilengkapi perlindungan siber yang solid.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Card 3: SEO Friendly --}}
                <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-[0_10px_30px_rgb(0,0,0,0.03)] hover:shadow-[0_20px_40px_rgb(37,99,235,0.12)] hover:-translate-y-3 transition-all duration-300 text-start w-full h-full flex flex-col group"
                    data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-start gap-4 mb-4">
                        <div
                            class="w-14 h-14 rounded-2xl bg-[#EEF9FE] text-blue-500 flex items-center justify-center flex-shrink-0 mb-2 shadow-sm border border-blue-100 group-hover:scale-110 group-hover:bg-blue-500 group-hover:text-white transition-all duration-300">
                            <!-- SVG: Search SEO -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6">
                                </path>
                            </svg>
                        </div>
                        <div class="pt-1">
                            <h4
                                class="font-extrabold text-[#111827] text-[18px] mb-2 leading-tight group-hover:text-blue-600 transition-colors">
                                Skalabel & Ramah SEO</h4>
                            <p class="text-[14.5px] text-slate-500 leading-relaxed">
                                Struktur kode mematuhi standar SEO Google sehingga mudah terindeks. Dashboard aplikasi
                                pun mudah dikelola.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center" data-aos="zoom-in" data-aos-delay="400">
                <a href="#layanan"
                    class="inline-flex items-center justify-center font-bold text-white bg-blue-600 hover:bg-blue-700 shadow-[0_10px_25px_rgba(37,99,235,0.35)] hover:-translate-y-1 transition-all px-10 py-3.5 rounded-[40px] gap-2 text-lg">
                    Layanan Kami
                    <svg class="w-5 h-5 ml-1 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>


    {{-- ================= TECHNOLOGY SCROLL ================= --}}
    <section id="skill" class="relative py-10 border-y border-slate-100 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <p class="text-center text-xs font-bold text-slate-400 uppercase tracking-widest mb-8">Teknologi yang
                digunakan</p>

            <div class="relative w-full overflow-hidden py-6">
                <div class="flex whitespace-nowrap animate-scroll gap-16 items-center"
                    style="animation-duration: 35s;">
                    @for ($i = 0; $i < 2; $i++)
                        <div
                            class="flex gap-16 items-center opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition duration-500">
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-laravel-plain text-red-600"></i> Laravel</span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-php-plain text-indigo-500"></i> PHP</span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-mysql-plain text-blue-600"></i> MySQL</span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-postgresql-plain text-blue-500"></i> PostgreSQL</span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-javascript-plain text-yellow-400"></i> JavaScript</span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-jquery-plain text-blue-400"></i> jQuery</span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-html5-plain text-orange-600"></i> HTML</span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-tailwindcss-original text-cyan-400"></i> Tailwind</span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-bootstrap-plain text-purple-600"></i> Bootstrap</span>
                            <span class="text-2xl font-bold flex items-center gap-2">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                REST API
                            </span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-flutter-plain text-blue-400"></i> Flutter</span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-dart-plain text-cyan-500"></i> Dart</span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-git-plain text-red-500"></i> Git</span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-github-original text-slate-800"></i> GitHub</span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-nodejs-plain text-green-600"></i> Node.js</span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-nestjs-plain text-red-600"></i> NestJS</span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-mongodb-plain text-green-500"></i> MongoDB</span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-go-original-wordmark text-cyan-600"></i> Golang</span>
                            <span class="text-2xl font-bold flex items-center gap-2"><i
                                    class="devicon-vuejs-plain text-green-500"></i> Vue.js</span>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="absolute top-0 left-0 w-32 h-full bg-gradient-to-r from-slate-50 to-transparent z-10"></div>
            <div class="absolute top-0 right-0 w-32 h-full bg-gradient-to-l from-slate-50 to-transparent z-10"></div>
        </div>
    </section>

    {{-- ================= ALUR KERJA / CARA KERJA ================= --}}
    <section class="py-20 relative bg-gradient-to-b from-slate-50 via-white to-white overflow-hidden ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Bagaimana Kami Bekerja?</h2>
                <p class="text-lg text-slate-500 max-w-2xl mx-auto">Proses pengerjaan yang transparan, terstruktur, dan
                    berorientasi pada kepuasan pelanggan dari awal hingga akhir.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
                {{-- Garis penghubung untuk desktop --}}
                <div
                    class="hidden md:block absolute top-12 left-0 right-0 w-[75%] mx-auto h-[3px] bg-slate-100 rounded-full z-0">
                </div>

                {{-- Step 1 --}}
                <div class="relative z-10 text-center flex flex-col items-center group" data-aos="fade-up"
                    data-aos-delay="100">
                    <div
                        class="w-24 h-24 rounded-full bg-white border-[6px] border-slate-50 shadow-lg flex items-center justify-center text-blue-600 mb-6 group-hover:scale-110 group-hover:border-blue-50 transition-all duration-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                    </div>
                    <div class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full mb-4 inline-block">
                        Langkah 1</div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Konsultasi Project</h3>
                    <p class="text-slate-500 text-sm leading-relaxed px-2">Ketahui kebutuhan spesifik Anda. Kita akan
                        mendiskusikan fitur, alur kerja, dan target aplikasi.</p>
                </div>

                {{-- Step 2 --}}
                <div class="relative z-10 text-center flex flex-col items-center group" data-aos="fade-up"
                    data-aos-delay="200">
                    <div
                        class="w-24 h-24 rounded-full bg-white border-[6px] border-slate-50 shadow-lg flex items-center justify-center text-indigo-500 mb-6 group-hover:scale-110 group-hover:border-indigo-50 transition-all duration-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                            </path>
                        </svg>
                    </div>
                    <div class="bg-indigo-500 text-white text-xs font-bold px-3 py-1 rounded-full mb-4 inline-block">
                        Langkah 2</div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Perancangan Desain</h3>
                    <p class="text-slate-500 text-sm leading-relaxed px-2">Membuat <i
                            class="text-slate-600">prototype/mockup</i> untuk memvisualisasikan bagaimana aplikasi
                        berjalan.</p>
                </div>

                {{-- Step 3 --}}
                <div class="relative z-10 text-center flex flex-col items-center group" data-aos="fade-up"
                    data-aos-delay="300">
                    <div
                        class="w-24 h-24 rounded-full bg-white border-[6px] border-slate-50 shadow-lg flex items-center justify-center text-purple-600 mb-6 group-hover:scale-110 group-hover:border-purple-50 transition-all duration-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <div class="bg-purple-600 text-white text-xs font-bold px-3 py-1 rounded-full mb-4 inline-block">
                        Langkah 3</div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Development Fase</h3>
                    <p class="text-slate-500 text-sm leading-relaxed px-2">Pengerjaan *coding* dengan metode tangkas
                        dan <i class="text-slate-600">clean code</i> untuk performa tinggi.</p>
                </div>

                {{-- Step 4 --}}
                <div class="relative z-10 text-center flex flex-col items-center group" data-aos="fade-up"
                    data-aos-delay="400">
                    <div
                        class="w-24 h-24 rounded-full bg-white border-[6px] border-slate-50 shadow-lg flex items-center justify-center text-emerald-500 mb-6 group-hover:scale-110 group-hover:border-emerald-50 transition-all duration-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="bg-emerald-500 text-white text-xs font-bold px-3 py-1 rounded-full mb-4 inline-block">
                        Langkah 4</div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Testing & Rilis</h3>
                    <p class="text-slate-500 text-sm leading-relaxed px-2">Uji coba menyeluruh terkait fungsionalitas
                        dan keamanan sebelum serah terima serta rilis.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= INFORMATION & APPROACH ================= --}}
    <section class="py-16 md:py-24 bg-white overflow-hidden border-t border-slate-100 relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
                
                {{-- Left: Code Graphic Illustration --}}
                <div class="w-full lg:w-1/2 relative" data-aos="fade-right">
                    <div class="absolute inset-0 bg-blue-100 rounded-[2rem] transform rotate-3 scale-105 transition-transform duration-500 hover:rotate-6"></div>
                    <div class="relative bg-slate-50 p-6 md:p-8 rounded-[2rem] border border-slate-200 aspect-[4/3] flex items-center justify-center overflow-hidden shadow-sm">
                        
                        {{-- Terminal Window --}}
                        <div class="w-full max-w-md bg-slate-900 rounded-xl shadow-2xl overflow-hidden hover:scale-105 transition-transform duration-500">
                            {{-- Terminal Header --}}
                            <div class="bg-slate-800 px-4 py-3 flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                <div class="w-3 h-3 rounded-full bg-yello-500 bg-amber-500"></div>
                                <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                            </div>
                            {{-- Terminal Body --}}
                            <div class="p-5 md:p-6 font-mono text-xs md:text-sm text-slate-300">
                                <div><span class="text-blue-400 font-bold">const</span> developer = {</div>
                                <div class="pl-4">name: <span class="text-emerald-400">'CodeByHasnan'</span>,</div>
                                <div class="pl-4">passion: <span class="text-emerald-400">'Web Development'</span>,</div>
                                <div class="pl-4">skills: [<span class="text-emerald-400">'Laravel'</span>, <span class="text-emerald-400">'Tailwind'</span>, <span class="text-emerald-400">'Clean Code'</span>],</div>
                                <div class="pl-4 mt-3 mb-1 text-slate-500 italic">// Misi utama kami:</div>
                                <div class="pl-4">build: () => {</div>
                                <div class="pl-8"><span class="text-purple-400">return</span> <span class="text-emerald-400">'Solusi Digital Berkualitas'</span>;</div>
                                <div class="pl-4">}</div>
                                <div>};</div>
                                <div class="mt-3"><span class="text-blue-400">developer</span>.<span class="text-blue-300">build</span>();</div>
                            </div>
                        </div>

                        {{-- Glow Accents --}}
                        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
                        <div class="absolute -top-10 -left-10 w-40 h-40 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
                    </div>
                </div>

                {{-- Right: Text Information --}}
                <div class="w-full lg:w-1/2" data-aos="fade-left">
                    <span class="inline-block py-1 px-3 rounded-full bg-blue-50 text-blue-600 text-xs font-bold tracking-widest uppercase mb-4">Informasi Layanan</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-6 leading-tight">Membangun Arsitektur Visual Berbasis Kode Terukur</h2>
                    <p class="text-slate-500 text-lg mb-8 leading-relaxed">
                        Fokus utama kami adalah menghadirkan infrastruktur web yang solid. Kami merancang solusi spesifik dari nol (custom) menggunakan framework modern untuk memecahkan proses operasional bisnis atau kampus yang rumit menjadi sebuah pengalaman digital yang sangat mudah dipakai.
                    </p>
                    
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start gap-4">
                            <div class="mt-1 flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <span class="text-slate-700 font-medium text-lg">Kode yang Rapi (Clean & Maintainable Code)</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1 flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <span class="text-slate-700 font-medium text-lg">Desain Responsif (Smartphone, Tablet, Desktop)</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1 flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <span class="text-slate-700 font-medium text-lg">Struktur Basis Data yang Terintegrasi Langsung</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    {{-- ================= SERVICES (BENTO GRID) ================= --}}
    <section id="layanan" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">
                    Fokus Layanan Utama
                </h2>
                <p class="text-slate-500 max-w-2xl mx-auto text-lg leading-relaxed">
                    Solusi IT profesional yang dirancang secara spesifik, mulai dari kebutuhan akademik hingga sistem
                    fungsional untuk pertumbuhan bisnis Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-24 relative">
                <!-- Decorative Elements -->
                <div
                    class="absolute -top-10 -left-10 w-32 h-32 bg-blue-100/50 rounded-full blur-2xl z-0 pointer-events-none">
                </div>
                <div
                    class="absolute -bottom-10 -right-10 w-32 h-32 bg-purple-100/50 rounded-full blur-2xl z-0 pointer-events-none">
                </div>

                {{-- Layanan 1: Skripsi --}}
                <div class="relative bg-white rounded-[2rem] p-8 border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_25px_60px_rgba(37,99,235,0.15)] hover:-translate-y-3 transition-all duration-500 group overflow-hidden z-10"
                    data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="absolute -top-24 -right-24 w-48 h-48 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-full blur-3xl opacity-10 group-hover:opacity-30 transition-opacity duration-500 z-0">
                    </div>
                    <div class="relative z-10 h-full flex flex-col">
                        <div class="flex items-center gap-4 mb-6">
                            <div
                                class="bg-gradient-to-br from-blue-50 to-blue-100/80 w-16 h-16 rounded-2xl flex-shrink-0 flex items-center justify-center text-blue-600 shadow-inner group-hover:scale-110 transition-transform duration-500">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-800 group-hover:text-blue-600 transition-colors">
                                Program Skripsi</h3>
                        </div>
                        <p class="text-slate-500 leading-relaxed mb-8 flex-grow text-sm md:text-base">
                            Jasa pembuatan sistem/aplikasi untuk memenuhi kebutuhan Tugas Akhir & Skripsi. Dilengkapi
                            source code rapi, bimbingan instalasi, dan dukungan dokumentasi.
                        </p>
                        <a href="/skripsi"
                            class="inline-flex w-fit items-center gap-2 text-blue-600 font-bold group-hover:gap-3 transition-all relative after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-0.5 after:bg-blue-600 group-hover:after:w-full after:transition-all after:duration-300">
                            Lihat Detail <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Layanan 2: Custom Web (Highlight) --}}
                <div class="relative bg-blue-600 text-white rounded-[2.5rem] p-8 md:p-12 shadow-2xl hover:shadow-[0_30px_70px_rgba(37,99,235,0.5)] hover:-translate-y-4 transition-all duration-500 group overflow-hidden md:-mt-8 md:-mb-8 z-30 border border-blue-400 flex flex-col ring-4 ring-blue-600/20"
                    data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-blue-400/40 via-blue-600 to-blue-700 opacity-90 group-hover:opacity-100 transition-opacity duration-500 z-0">
                    </div>
                    <div
                        class="absolute -bottom-24 -left-24 w-64 h-64 bg-gradient-to-tr from-cyan-300 to-blue-400 rounded-full blur-[80px] opacity-40 group-hover:opacity-60 transition-opacity duration-500 z-0">
                    </div>

                    <div class="relative z-10 h-full flex flex-col">
                        <div class="flex items-center gap-4 mb-6">
                            <div
                                class="bg-white/10 border border-white/20 w-20 h-20 rounded-3xl flex-shrink-0 flex items-center justify-center text-white shadow-[inset_0_2px_10px_rgba(255,255,255,0.2)] backdrop-blur-md group-hover:scale-110 transition-transform duration-500">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-extrabold text-white leading-tight">Custom Web <br
                                    class="hidden md:block"> Bisnis</h3>
                        </div>
                        <p class="text-blue-100 leading-relaxed mb-10 flex-grow text-base md:text-lg">
                            Pembuatan web application tingkat lanjut seperti ERP, Point of Sales, Sistem HRIS yang
                            dirancang khusus (custom-made) mengikuti unique workflow bisnis Anda.
                        </p>
                        <a href="{{ route('services.custom-web') }}"
                            class="inline-flex w-fit items-center justify-center gap-2 bg-white text-blue-600 hover:bg-blue-50 font-bold py-4 px-8 rounded-2xl md:text-lg group-hover:gap-3 transition-all duration-300 shadow-[0_8px_25px_rgba(255,255,255,0.25)]">
                            Lihat Detail <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Layanan 3: Kerja Praktek --}}
                <div class="relative bg-white rounded-[2rem] p-8 border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_25px_60px_rgba(16,185,129,0.15)] hover:-translate-y-3 transition-all duration-500 group overflow-hidden z-10 flex flex-col"
                    data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="absolute -top-24 -right-24 w-48 h-48 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full blur-3xl opacity-10 group-hover:opacity-30 transition-opacity duration-500 z-0">
                    </div>
                    <div class="relative z-10 h-full flex flex-col">
                        <div class="flex items-center gap-4 mb-6">
                            <div
                                class="bg-gradient-to-br from-emerald-50 to-emerald-100/80 w-16 h-16 rounded-2xl flex-shrink-0 flex items-center justify-center text-emerald-600 shadow-inner group-hover:scale-110 transition-transform duration-500">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                </svg>
                            </div>
                            <h3
                                class="text-2xl font-bold text-slate-800 group-hover:text-emerald-600 transition-colors">
                                Kerja Praktek</h3>
                        </div>
                        <p class="text-slate-500 leading-relaxed mb-8 flex-grow text-sm md:text-base">
                            Solusi project Tugas Kerja Praktek/Magang siap presentasi. Mencakup Website Company, Sistem
                            Inventori ringan, atau Mockup Aplikasi yang profesional.
                        </p>
                        <a href="{{ route('services.kerja-praktek') }}"
                            class="inline-flex w-fit items-center gap-2 text-emerald-600 font-bold group-hover:gap-3 transition-all relative after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-0.5 after:bg-emerald-600 group-hover:after:w-full after:transition-all after:duration-300">
                            Lihat Detail <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ================= STATISTIK & HIGHLIGHT ================= --}}
    <section class="py-12 md:py-16 relative z-10 w-full mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-y-10 md:gap-y-0 text-center">

                {{-- Stat 1 --}}
                <div data-aos="fade-up" data-aos-delay="100"
                    class="flex flex-col items-center justify-center md:border-r border-slate-200/70">
                    <h3
                        class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-slate-800 mb-1.5 md:mb-2 tracking-tight">
                        10<span class="text-blue-600">+</span>
                    </h3>
                    <p class="text-slate-500 font-medium text-sm md:text-base">Project Terselesaikan</p>
                </div>

                {{-- Stat 2 --}}
                <div data-aos="fade-up" data-aos-delay="200"
                    class="flex flex-col items-center justify-center md:border-r border-slate-200/70">
                    <h3
                        class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-slate-800 mb-1.5 md:mb-2 tracking-tight">
                        100<span class="text-blue-600">%</span>
                    </h3>
                    <p class="text-slate-500 font-medium text-sm md:text-base">Kepuasan Klien</p>
                </div>

                {{-- Stat 3 --}}
                <div data-aos="fade-up" data-aos-delay="300"
                    class="flex flex-col items-center justify-center md:border-r border-slate-200/70">
                    <h3
                        class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-slate-800 mb-1.5 md:mb-2 tracking-tight">
                        24<span class="text-blue-600">/7</span>
                    </h3>
                    <p class="text-slate-500 font-medium text-sm md:text-base">Dukungan Garansi</p>
                </div>

                {{-- Stat 4 --}}
                <div data-aos="fade-up" data-aos-delay="400" class="flex flex-col items-center justify-center">
                    <h3
                        class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-slate-800 mb-1.5 md:mb-2 tracking-tight font-mono">
                        <span class="text-blue-600">&lt;</span>/<span class="text-blue-600">&gt;</span>
                    </h3>
                    <p class="text-slate-500 font-medium text-sm md:text-base">Standar Kode Bersih</p>
                </div>

            </div>
        </div>
    </section>

    {{-- ================= FAQ SECTION ================= --}}
    <section id="faq" class="py-24 bg-gradient-to-b from-white via-slate-50/80 to-slate-50 overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Pertanyaan Umum (FAQ)</h2>
                <p class="text-slate-500 text-lg">Jawaban atas pertanyaan yang sering diajukan oleh klien sebelum
                    memulai project.</p>
            </div>

            <div class="space-y-4 relative">
                {{-- Decorative glow --}}
                <div
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[80%] bg-blue-50/50 rounded-full blur-3xl -z-10 pointer-events-none">
                </div>

                {{-- FAQ 1 --}}
                <details
                    class="group rounded-[1.5rem] border border-slate-200 bg-slate-50/70 p-5 md:p-8 shadow-[0_5px_15px_rgb(0,0,0,0.02)] transition-all duration-300 open:bg-white open:shadow-[0_15px_40px_rgb(0,0,0,0.06)] open:border-blue-100"
                    data-aos="fade-up" data-aos-delay="100">
                    <summary
                        class="flex cursor-pointer list-none items-center justify-between gap-4 text-base md:text-xl font-bold text-slate-800 group-open:text-blue-600 transition-colors">
                        Berapa lama waktu pengerjaan sebuah website atau sistem?
                        <span
                            class="text-2xl md:text-3xl font-light leading-none text-slate-400 transition-transform duration-300 group-open:rotate-45 group-open:text-blue-500 flex-shrink-0 ml-2">+</span>
                    </summary>
                    <p class="pt-4 text-sm md:text-base text-slate-500 leading-relaxed">
                        Waktu pengerjaan bervariasi bergantung pada tingkat kerumitan fitur. Untuk program skripsi atau
                        website <i class="text-slate-600">company profile</i> biasanya memakan waktu 1-2 minggu.
                        Sedangkan untuk aplikasi bisnis <i class="text-slate-600">custom</i> yang jauh lebih kompleks
                        dan terintegrasi bisa memakan waktu 1-3 bulan.
                    </p>
                </details>

                {{-- FAQ 2 --}}
                <details
                    class="group rounded-[1.5rem] border border-slate-200 bg-slate-50/70 p-5 md:p-8 shadow-[0_5px_15px_rgb(0,0,0,0.02)] transition-all duration-300 open:bg-white open:shadow-[0_15px_40px_rgb(0,0,0,0.06)] open:border-blue-100"
                    data-aos="fade-up" data-aos-delay="150">
                    <summary
                        class="flex cursor-pointer list-none items-center justify-between gap-4 text-base md:text-xl font-bold text-slate-800 group-open:text-blue-600 transition-colors">
                        Apakah saya akan mendapatkan source code secara penuh?
                        <span
                            class="text-2xl md:text-3xl font-light leading-none text-slate-400 transition-transform duration-300 group-open:rotate-45 group-open:text-blue-500 flex-shrink-0 ml-2">+</span>
                    </summary>
                    <p class="pt-4 text-sm md:text-base text-slate-500 leading-relaxed">
                        Tentu. Setelah project dipastikan selesai seluruhnya dan tahap pelunasan berhasil dilakukan,
                        seluruh <i class="text-slate-600">source code</i> beserta aset pendukung (termasuk *database*)
                        akan diserahkan sepenuhnya kepada Anda, terkecuali jika ada kesepakatan lisensi khusus sejak
                        awal.
                    </p>
                </details>

                {{-- FAQ 3 --}}
                <details
                    class="group rounded-[1.5rem] border border-slate-200 bg-slate-50/70 p-5 md:p-8 shadow-[0_5px_15px_rgb(0,0,0,0.02)] transition-all duration-300 open:bg-white open:shadow-[0_15px_40px_rgb(0,0,0,0.06)] open:border-blue-100"
                    data-aos="fade-up" data-aos-delay="200">
                    <summary
                        class="flex cursor-pointer list-none items-center justify-between gap-4 text-base md:text-xl font-bold text-slate-800 group-open:text-blue-600 transition-colors">
                        Bagaimana sistem pembayaran project di CodeByHasnan?
                        <span
                            class="text-2xl md:text-3xl font-light leading-none text-slate-400 transition-transform duration-300 group-open:rotate-45 group-open:text-blue-500 flex-shrink-0 ml-2">+</span>
                    </summary>
                    <p class="pt-4 text-sm md:text-base text-slate-500 leading-relaxed">
                        Untuk kepastian profesional secara resiprokal demi kelancaran pengerjaan project, kami
                        menerapkan sistem tanda jadi atau <i>Down Payment</i> (DP) sebesar 30% - 40% di awal sebelum
                        *development* dikerjakan. Sisa pembayaran dilunasi pada akhir siklus setelah aplikasi berhasil
                        diselesaikan, dikonfirmasi ulang melalui fase *testing*, dan siap dirilis seutuhnya.
                    </p>
                </details>

                {{-- FAQ 4 --}}
                <details
                    class="group rounded-[1.5rem] border border-slate-200 bg-slate-50/70 p-5 md:p-8 shadow-[0_5px_15px_rgb(0,0,0,0.02)] transition-all duration-300 open:bg-white open:shadow-[0_15px_40px_rgb(0,0,0,0.06)] open:border-blue-100"
                    data-aos="fade-up" data-aos-delay="250">
                    <summary
                        class="flex cursor-pointer list-none items-center justify-between gap-4 text-base md:text-xl font-bold text-slate-800 group-open:text-blue-600 transition-colors">
                        Apakah ada garansi maintenance jika terjadi error (bug)?
                        <span
                            class="text-2xl md:text-3xl font-light leading-none text-slate-400 transition-transform duration-300 group-open:rotate-45 group-open:text-blue-500 flex-shrink-0 ml-2">+</span>
                    </summary>
                    <p class="pt-4 text-sm md:text-base text-slate-500 leading-relaxed">
                        Pasti. Setiap aplikasi atau fitur yang telah diserahterimakan memiliki komitmen garansi
                        pemeliharaan perbaikan <i class="text-slate-600">bug/error</i> gratis dan dukungan fungsional
                        selama 1 hingga 3 bulan sesudah implementasi. Kami menjamin sistem berjalan sehat dan stabil
                        selaras dengan cakupan awal target.
                    </p>
                </details>

                {{-- FAQ 5 --}}
                <details
                    class="group rounded-[1.5rem] border border-slate-200 bg-slate-50/70 p-5 md:p-8 shadow-[0_5px_15px_rgb(0,0,0,0.02)] transition-all duration-300 open:bg-white open:shadow-[0_15px_40px_rgb(0,0,0,0.06)] open:border-blue-100"
                    data-aos="fade-up" data-aos-delay="300">
                    <summary
                        class="flex cursor-pointer list-none items-center justify-between gap-4 text-base md:text-xl font-bold text-slate-800 group-open:text-blue-600 transition-colors">
                        Saya punya ide sistem tapi belum ada bentuk desainnya, apakah bisa dibantu?
                        <span
                            class="text-2xl md:text-3xl font-light leading-none text-slate-400 transition-transform duration-300 group-open:rotate-45 group-open:text-blue-500 flex-shrink-0 ml-2">+</span>
                    </summary>
                    <p class="pt-4 text-sm md:text-base text-slate-500 leading-relaxed">
                        Sangat bisa! Anda mendeskripsikan ringkas ide alur dan sasaran penggunaan aplikasinya, lalu tim
                        kami akan proaktif merancang analisis kebutuhan komprehensifnya. Setelah itu kita membedah
                        konsep struktur desain (Mockup/UI), lalu mengeksekusi tahapan pemrograman dari nol agar sesuai
                        impian final Anda.
                    </p>
                </details>
            </div>
        </div>
    </section>


    {{-- ================= ABOUT & STATS ================= --}}
    <section id="about" class="py-24 relative overflow-hidden bg-slate-50">
        <!-- Abstract Decoration Background -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
            <div class="absolute -top-[20%] -left-[10%] w-[50%] h-[50%] rounded-full bg-blue-400/5 blur-[120px]"></div>
            <div class="absolute top-[60%] -right-[10%] w-[40%] h-[60%] rounded-full bg-indigo-400/5 blur-[120px]">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Tentang Kami</h2>
                <p class="text-slate-500 text-lg">Mengenal lebih dekat pengalaman dan profil profesional kami</p>
            </div>
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                {{-- Left Column: About & Stats --}}
                <div data-aos="fade-right">
                    {{-- <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 border border-blue-100 text-blue-600 font-semibold text-sm mb-6 shadow-sm">
                        <span class="relative flex h-2.5 w-2.5">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                            <span clas  ="relative inline-flex rounded-full h-2.5 w-2.5 bg-blue-600"></span>
                        </span>
                        Tentang Kami
                    </div> --}}

                    <h2 class="text-md md:text-4xl font-extrabold text-slate-900 mb-6 leading-[1.2] tracking-tight">
                        Bukan Sekadar Koding, <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Tapi
                            Solusi Bisnis.</span>
                    </h2>

                    <div class="text-slate-500 text-lg leading-relaxed mb-10 space-y-4">
                        <p>
                            <strong class="text-slate-800 font-bold">CodeByHasnan</strong> hadir sebagai mitra
                            teknologi tepercaya yang berdedikasi untuk mendesain dan
                            membangun aplikasi web dengan menggabungkan logika sistem yang kokoh serta estetika
                            antarmuka
                            modern.
                        </p>
                        <p>
                            Kami telah berpengalaman membangun beragam produk digital—mulai dari <strong
                                class="text-slate-800 font-bold">Sistem Informasi, ERP, hingga Web Interaktif</strong>.
                            Fokus kerja kami selalu berpijak pada kode yang rapi (clean code), skalabilitas masa depan,
                            dan
                            performa aplikasi yang sangat cepat.
                        </p>
                    </div>

                    {{-- STATISTIK BENTO --}}
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 pt-4 border-t border-slate-200/60 mt-4">
                        <div
                            class="group bg-white rounded-2xl p-5 border border-slate-100 shadow-[0_5px_15px_rgb(0,0,0,0.03)] hover:shadow-[0_20px_40px_rgb(37,99,235,0.12)] hover:-translate-y-2 transition-all duration-300">
                            <p
                                class="text-4xl font-black text-slate-800 mb-1 group-hover:text-blue-600 transition-colors">
                                2<span class="text-blue-500">+</span>
                            </p>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest leading-tight">
                                Tahun<br>Pengalaman</p>
                        </div>

                        <div
                            class="group bg-white rounded-2xl p-5 border border-slate-100 shadow-[0_5px_15px_rgb(0,0,0,0.03)] hover:shadow-[0_20px_40px_rgb(99,102,241,0.12)] hover:-translate-y-2 transition-all duration-300">
                            <p
                                class="text-4xl font-black text-slate-800 mb-1 group-hover:text-indigo-600 transition-colors">
                                10<span class="text-indigo-500">+</span>
                            </p>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest leading-tight">
                                Projek<br>Selesai</p>
                        </div>

                        <div
                            class="group bg-white rounded-2xl p-5 border border-slate-100 shadow-[0_5px_15px_rgb(0,0,0,0.03)] hover:shadow-[0_20px_40px_rgb(168,85,247,0.12)] hover:-translate-y-2 transition-all duration-300 col-span-2 md:col-span-1">
                            <p
                                class="text-4xl font-black text-slate-800 mb-1 group-hover:text-purple-600 transition-colors">
                                15<span class="text-purple-500">+</span>
                            </p>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest leading-tight">
                                Tech Stack<br>Dikuasai</p>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Why Choose Me Panel --}}
                <div data-aos="fade-left" class="relative group mt-10 lg:mt-0 cursor-default">
                    <div
                        class="absolute inset-0 bg-gradient-to-tr from-blue-500 to-purple-500 rounded-[2.5rem] rotate-3 opacity-15 group-hover:rotate-6 group-hover:scale-105 group-hover:opacity-20 transition-all duration-700 blur-[30px] z-0">
                    </div>
                    <div
                        class="relative bg-white rounded-[2.5rem] p-8 md:p-10 border border-slate-100 shadow-[0_20px_50px_rgba(0,0,0,0.04)] hover:shadow-[0_30px_60px_rgba(37,99,235,0.15)] hover:-translate-y-3 transition-all duration-500 z-10 overflow-hidden">

                        <!-- Accent Decorative Background -->
                        <div
                            class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-bl from-blue-50 to-transparent rounded-bl-full -z-10">
                        </div>

                        <div class="flex items-center gap-4 mb-10">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl flex items-center justify-center text-blue-600 shadow-inner group-hover:scale-110 transition-transform duration-500">
                                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                            </div>
                            <h3 class="font-extrabold text-2xl text-slate-900 tracking-tight">Kelebihan Jasa Kami</h3>
                        </div>

                        <div class="space-y-6">
                            {{-- Item 1 --}}
                            <div class="flex gap-5 group/item cursor-default">
                                <div
                                    class="w-12 h-12 rounded-xl bg-slate-50 border border-slate-100 text-blue-600 flex items-center justify-center flex-shrink-0 group-hover/item:bg-blue-600 group-hover/item:text-white group-hover/item:shadow-[0_8px_20px_rgba(37,99,235,0.3)] group-hover/item:-translate-y-1 transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                    </svg>
                                </div>
                                <div class="pt-0.5">
                                    <strong
                                        class="text-slate-900 block text-lg font-extrabold mb-1.5 group-hover/item:text-blue-600 transition-colors">Best
                                        Practice Code</strong>
                                    <p class="text-sm text-slate-500 leading-relaxed font-normal">Struktur kode bersih
                                        sesuai standar industri modern. Keamanan terjamin dengan implementasi
                                        architecture kokoh.</p>
                                </div>
                            </div>

                            {{-- Item 2 --}}
                            <div class="flex gap-5 group/item cursor-default">
                                <div
                                    class="w-12 h-12 rounded-xl bg-slate-50 border border-slate-100 text-emerald-500 flex items-center justify-center flex-shrink-0 group-hover/item:bg-emerald-500 group-hover/item:text-white group-hover/item:shadow-[0_8px_20px_rgba(16,185,129,0.3)] group-hover/item:-translate-y-1 transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <div class="pt-0.5">
                                    <strong
                                        class="text-slate-900 block text-lg font-extrabold mb-1.5 group-hover/item:text-emerald-500 transition-colors">Performa
                                        & Kecepatan Akses</strong>
                                    <p class="text-sm text-slate-500 leading-relaxed font-normal">Integrasi database
                                        efisien serta optimasi di level frontend, mencegah lag ketika aplikasi diakses
                                        secara masif.</p>
                                </div>
                            </div>

                            {{-- Item 3 --}}
                            <div class="flex gap-5 group/item cursor-default">
                                <div
                                    class="w-12 h-12 rounded-xl bg-slate-50 border border-slate-100 text-amber-500 flex items-center justify-center flex-shrink-0 group-hover/item:bg-amber-500 group-hover/item:text-white group-hover/item:shadow-[0_8px_20px_rgba(245,158,11,0.3)] group-hover/item:-translate-y-1 transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="pt-0.5">
                                    <strong
                                        class="text-slate-900 block text-lg font-extrabold mb-1.5 group-hover/item:text-amber-500 transition-colors">Disiplin
                                        Waktu Rilis</strong>
                                    <p class="text-sm text-slate-500 leading-relaxed font-normal">Manajemen timeline
                                        terukur tanpa mengorbankan fungsionalitas, aplikasi rilis dan berjalan lancar
                                        sesuai target bisnis.</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                <a href="https://wa.me/+6283163655478" target="_blank"
                    class="px-8 py-4 bg-white text-blue-700 font-bold rounded-full hover:bg-slate-100 hover:-translate-y-1 transition-all shadow-xl flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    Chat WhatsApp
                </a>
                <a href="mailto:ahasnan32@gmail.com" target="_blank"
                    class="px-8 py-4 bg-transparent border border-white/30 text-white font-bold rounded-full hover:bg-white/10 hover:-translate-y-1 transition-all">
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
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Footer">
                    </div>
                    <span class="font-bold text-xl text-slate-900">CodeByHasnan</span>
                </div>
                <div class="flex gap-6">
                    <a href="https://github.com/HasnanAlii" target="_blank"
                        class="text-slate-400 hover:text-slate-900 transition hover:-translate-y-1"><i
                            class="devicon-github-original text-2xl"></i></a>
                    <a href="https://www.linkedin.com/in/hasnan-ali-705184259/" target="_blank"
                        class="text-slate-400 hover:text-blue-600 transition hover:-translate-y-1"><i
                            class="devicon-linkedin-plain text-2xl"></i></a>
                </div>
            </div>
            <div
                class="text-center md:text-left border-t border-slate-200 pt-8 flex flex-col md:flex-row justify-between text-sm text-slate-500">
                <p>&copy; {{ date('Y') }} Code By Hasnan. All rights reserved.</p>
                <p>Made with <span class="text-red-500">&hearts;</span> using Laravel & Tailwind</p>
            </div>
        </div>
    </footer>
    </main>

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

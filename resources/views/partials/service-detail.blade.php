<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $metaTitle ?? config('app.name', 'Code By Hasnan') . ' - ' . $title }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <meta name="theme-color" content="{{ $accent }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        .bg-grid-pattern {
            background-image: linear-gradient(to right, #f1f5f9 1px, transparent 1px),
                linear-gradient(to bottom, #f1f5f9 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .service-shell {
            --accent: {{ $accent }};
            --accent-dark: {{ $accentDark }};
            --accent-soft: {{ $accentSoft }};
            --accent-border: {{ $accentBorder }};
            --accent-shadow: {{ $accentShadow }};
        }

        .service-gradient {
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%);
        }

        .service-text {
            color: var(--accent);
        }

        .service-soft {
            background-color: var(--accent-soft);
            border-color: var(--accent-border);
        }

        .service-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 28px 60px var(--accent-shadow);
        }
    </style>
</head>

<body class="service-shell bg-white text-slate-800 font-sans antialiased selection:text-white overflow-x-hidden"
    style="selection-background-color: var(--accent);">
    <div class="fixed inset-0 bg-grid-pattern -z-50 opacity-60 pointer-events-none"></div>
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[820px] h-[480px] rounded-full blur-[110px] -z-40 pointer-events-none opacity-70"
        style="background: radial-gradient(circle, {{ $accentSoft }} 0%, transparent 70%);"></div>

    <nav class="fixed top-0 w-full z-50 border-b border-slate-200/60 bg-white/85 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-[72px] md:h-20 items-center justify-between gap-4">
                <a href="{{ route('welcome') }}" class="flex items-center gap-2.5 md:gap-3 group shrink-0 w-[55%] md:w-auto">
                    <div
                        class="w-10 h-10 md:w-14 flex rounded-md items-center justify-center transition duration-300 group-hover:scale-105 shrink-0">
                        <img src="{{ asset('images/logo.png') }}" class="w-full h-full object-contain" alt="CodeByHasnan logo">
                    </div>
                    <div class="truncate">
                        <p class="font-bold text-sm md:text-lg text-slate-900 leading-none truncate">CodeByHasnan</p>
                        <p class="text-[10px] md:text-xs text-slate-500 mt-1 truncate">{{ $navLabel }}</p>
                    </div>
                </a>
                <div class="hidden md:flex items-center gap-6 text-sm font-medium text-slate-600">
                    <a href="#ringkasan" class="hover:text-slate-900 transition">Ringkasan</a>
                    <a href="#deliverables" class="hover:text-slate-900 transition">Deliverables</a>
                    <a href="#pricing" class="hover:text-slate-900 transition">Paket</a>
                    <a href="#faq" class="hover:text-slate-900 transition">FAQ</a>
                </div>
                <div class="flex items-center shrink-0">
                    <a href="{{ route('welcome') }}#layanan"
                        class="hidden md:inline-flex mr-3 px-4 py-2.5 rounded-full border border-slate-200 text-sm font-semibold text-slate-700 hover:border-slate-300 hover:bg-slate-50 transition">Kembali</a>
                    <a href="{{ $ctaLink }}" target="_blank"
                        class="inline-flex items-center gap-2 px-4 md:px-5 py-2 md:py-2.5 rounded-full text-xs md:text-sm font-bold text-white transition hover:opacity-95"
                        style="background-color: var(--accent); box-shadow: 0 10px 20px md:0 12px 30px var(--accent-shadow);">
                        {{ $ctaLabel }}
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section class="relative pt-28 pb-16 md:pt-36 md:pb-20 lg:pt-60 lg:pb-40 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col-reverse lg:grid lg:grid-cols-[1.15fr_0.85fr] gap-10 items-center mt-t">
                <div data-aos="fade-right" class="text-center md:text-left mt-6 lg:mt-0">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight leading-[1.1] text-slate-900 mb-4 md:mb-6">
                        {{ $title }}
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl text-slate-500 leading-relaxed md:max-w-2xl mx-auto md:mx-0 mb-8 md:mb-10">
                        {{ $subtitle }}
                    </p>
                    <div class="flex flex-col sm:flex-row items-center gap-3 md:gap-4 mb-10 md:mb-12">
                        <a href="{{ $ctaLink }}" target="_blank"
                            class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-full px-8 py-4 font-bold text-white transition hover:-translate-y-1"
                            style="background-color: var(--accent); box-shadow: 0 16px 38px var(--accent-shadow);">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            {{ $heroPrimaryAction }}
                        </a>
                        <a href="#deliverables"
                            class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-full px-8 py-4 font-bold text-slate-700 border border-slate-200 bg-white hover:border-slate-300 hover:-translate-y-1 transition">
                            Lihat Detail Layanan
                        </a>
                    </div>
                    <div class="flex flex-col sm:flex-row divide-y sm:divide-y-0 sm:divide-x divide-slate-200/80 border-y sm:border-y-0 sm:border-t border-slate-200/80 mt-10 pt-0 sm:pt-8 w-full">
                        @foreach ($stats as $stat)
                            <div class="flex-1 flex items-center justify-center sm:justify-start gap-4 py-4 sm:py-0 sm:px-6 first:sm:pl-0 last:sm:pr-0 group">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center shrink-0 transition-transform group-hover:scale-110 duration-300" style="background-color: {{ $accentSoft }}; color: {{ $accent }};">
                                    @if(isset($stat['icon']))
                                        {!! $stat['icon'] !!}
                                    @else
                                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @endif
                                </div>
                                <div class="text-left">
                                    <p class="text-xl md:text-2xl font-extrabold tracking-tight leading-none mb-1.5 transition-colors" style="color: {{ $accentDark }};">
                                        {{ $stat['value'] }}</p>
                                    <p class="text-[11px] md:text-xs font-bold text-slate-500 uppercase tracking-widest">{{ $stat['label'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div data-aos="fade-left" class="relative flex items-center justify-center w-full max-w-md md:max-w-none mx-auto lg:pl-10 mt-8 lg:mt-0">
                    {{-- Efek Glow di belakang Gambar --}}
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[130%] h-[130%] max-w-lg rounded-full blur-[90px] opacity-60 md:opacity-70"
                        style="background: radial-gradient(circle, {{ $accentSoft }} 0%, transparent 70%);"></div>
                    
                    {{-- Ilustrasi Gambar --}}
                    <div class="relative w-full aspect-square lg:aspect-[4/3] drop-shadow-2xl hover:-translate-y-4 transition-transform duration-700 ease-out flex items-center justify-center">
                        <img src="{{ $heroImage ?? 'https://illustrations.popsy.co/blue/web-design.svg' }}" 
                             alt="Ilustrasi Layanan {{ $title }}" 
                             class="w-full h-full object-contain filter drop-shadow-[0_20px_40px_rgba(0,0,0,0.15)] scale-110 md:scale-125 lg:scale-[1.4]">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="ringkasan" class="py-16 md:py-20 bg-slate-50/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-10 md:mb-14" data-aos="fade-up">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-slate-900 mb-4">Apa yang Anda Dapatkan</h2>
                <p class="text-base md:text-lg text-slate-500 leading-relaxed px-2">Setiap layanan dirancang supaya hasil akhirnya bukan
                    sekadar tampilan jadi, tetapi benar-benar siap dipresentasikan, diuji, dan digunakan.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 md:gap-6">
                @foreach ($highlights as $highlight)
                    <div class="service-card rounded-[1.5rem] md:rounded-[1.75rem] border border-slate-100 bg-white p-6 md:p-7 shadow-[0_14px_40px_rgba(15,23,42,0.05)] transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 100 }}">
                        <div class="w-12 h-12 md:w-14 md:h-14 rounded-xl md:rounded-2xl flex items-center justify-center mb-4 md:mb-5 text-xl font-black"
                            style="background-color: {{ $accentSoft }}; color: {{ $accent }};">
                            {!! $highlight['icon'] !!}
                        </div>
                        <h3 class="text-lg md:text-xl font-extrabold text-slate-900 mb-2.5 md:mb-3 leading-tight">{{ $highlight['title'] }}</h3>
                        <p class="text-sm md:text-base leading-relaxed text-slate-500">{{ $highlight['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @php $illusColor = str_contains($heroImage ?? 'blue', 'teal') ? 'teal' : 'blue'; @endphp

    <section id="alur-kerja" class="py-16 md:py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 md:gap-20 items-center">
                <!-- Text / Timeline -->
                <div data-aos="fade-right">
                    <div class="inline-flex rounded-full px-3 md:px-4 py-1.5 md:py-2 text-xs md:text-sm font-semibold mb-5 md:mb-6"
                        style="background-color: {{ $accentSoft }}; color: {{ $accentDark }};">
                        Alur Kerja
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-slate-900 mb-8 md:mb-10 leading-tight">Proses pengerjaan yang terstruktur</h2>
                    
                    <div class="space-y-8 md:space-y-10 relative before:absolute before:inset-0 before:ml-[1.35rem] md:before:ml-[1.70rem] before:-translate-x-px md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-slate-200 before:via-slate-200 before:to-transparent">
                        @foreach ($workflow as $step)
                            <div class="relative flex gap-5 md:gap-8 items-start group">
                                <div class="w-11 h-11 md:w-14 md:h-14 rounded-full flex items-center justify-center flex-shrink-0 relative z-10 transition-transform duration-500 group-hover:scale-110 shadow-sm border-[4px] border-white"
                                    style="background-color: {{ $accentSoft }}; color: {{ $accentDark }};">
                                    <span class="text-sm md:text-base font-black">{{ sprintf('%02d', $loop->iteration) }}</span>
                                </div>
                                <div class="pt-1.5 md:pt-2">
                                    <h3 class="font-bold text-lg md:text-xl text-slate-900 mb-2 transition-colors">{{ $step['title'] }}</h3>
                                    <p class="text-sm md:text-base text-slate-500 leading-relaxed">{{ $step['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Illustration -->
                <div data-aos="fade-left" class="relative flex items-center justify-center w-full max-w-lg mx-auto lg:max-w-none">
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] rounded-full blur-[80px] opacity-40 z-0"
                        style="background: radial-gradient(circle, {{ $accentSoft }} 0%, transparent 70%);"></div>
                    <img src="https://illustrations.popsy.co/{{ $illusColor }}/surreal-hourglass.svg" alt="Ilustrasi Alur Kerja" class="relative z-10 w-full h-auto drop-shadow-2xl hover:-translate-y-3 transition-transform duration-700 ease-out" onerror="this.src='https://illustrations.popsy.co/{{ $illusColor }}/web-design.svg'">
                </div>
            </div>
        </div>
    </section>

    <!-- Output / Deliverables Section -->
    <section id="deliverables" class="py-16 md:py-24 bg-slate-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 md:gap-20 items-center">
                <!-- Illustration (Order First on Desktop) -->
                <div data-aos="fade-right" class="relative flex items-center justify-center w-full max-w-lg mx-auto lg:max-w-none order-last lg:order-first">
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] rounded-full blur-[80px] opacity-40 z-0"
                        style="background: radial-gradient(circle, {{ $accentSoft }} 0%, transparent 70%);"></div>
                    <img src="https://illustrations.popsy.co/{{ $illusColor }}/product-launch.svg" alt="Ilustrasi Output Pengerjaan" class="relative z-10 w-full h-auto drop-shadow-2xl hover:-translate-y-3 transition-transform duration-700 ease-out" onerror="this.src='https://illustrations.popsy.co/{{ $illusColor }}/freelancer.svg'">
                </div>

                <!-- Text / Output Grid -->
                <div data-aos="fade-left">
                    <div class="inline-flex rounded-full px-3 md:px-4 py-1.5 md:py-2 text-xs md:text-sm font-semibold mb-5 md:mb-6"
                        style="background-color: {{ $accentSoft }}; color: {{ $accentDark }};">
                        Output Pengerjaan
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-slate-900 mb-8 md:mb-10 leading-tight">Deliverables yang disiapkan untuk Anda</h2>
                    
                    <div class="grid sm:grid-cols-2 gap-4 md:gap-6">
                        @foreach ($deliverables as $deliverable)
                            <div class="rounded-2xl md:rounded-3xl border border-slate-100 bg-white p-5 md:p-6 shadow-[0_8px_20px_rgba(15,23,42,0.04)] hover:shadow-[0_15px_30px_rgba(15,23,42,0.08)] transition-all duration-300 hover:-translate-y-1 group">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl mb-4 md:mb-5 flex items-center justify-center transition-transform group-hover:scale-110"
                                    style="background-color: {{ $accentSoft }}; color: {{ $accent }};">
                                    @if(isset($deliverable['icon']))
                                        {!! $deliverable['icon'] !!}
                                    @else
                                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            @if($loop->index == 0)
                                                {{-- Ikon Komputer/Sistem Web --}}
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            @elseif($loop->index == 1)
                                                {{-- Ikon Database/Data --}}
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                                            @elseif($loop->index == 2)
                                                {{-- Ikon Setelan/Role/Panduan --}}
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                            @else
                                                {{-- Ikon File/Dokumen Roadmap/Revisi --}}
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            @endif
                                        </svg>
                                    @endif
                                </div>
                                <h3 class="font-bold text-base md:text-lg text-slate-900 mb-2 leading-snug">{{ $deliverable['title'] }}</h3>
                                <p class="text-xs md:text-sm text-slate-500 leading-relaxed">
                                    {{ $deliverable['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 md:gap-20 items-center">
                <!-- Text & Benefits List (Left column like Alur Kerja timeline text) -->
                <div data-aos="fade-right">
                    <div class="inline-flex rounded-full px-3 md:px-4 py-1.5 md:py-2 text-xs md:text-sm font-semibold mb-5 md:mb-6"
                        style="background-color: {{ $accentSoft }}; color: {{ $accentDark }};">Keunggulan Pelayanan</div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-slate-900 leading-snug md:leading-tight mb-6 md:mb-8">Memberikan nilai lebih untuk hasil project Anda.</h2>
                    <p class="text-base md:text-lg text-slate-500 leading-relaxed mb-10 md:mb-12">Saya menyesuaikan pengerjaan dengan target akhir Anda: presentasi kampus, demo ke dosen, atau implementasi bisnis harian yang harus stabil.</p>
                    
                    <div class="space-y-6 md:space-y-8">
                        @foreach ($benefits as $benefit)
                            <div class="flex gap-4 md:gap-6 items-start group">
                                <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl flex items-center justify-center flex-shrink-0 transition-transform duration-500 group-hover:scale-110 shadow-sm group-hover:rotate-3"
                                    style="background-color: {{ $accentSoft }}; color: {{ $accent }}; border: 1px solid {{ $accentBorder }};">
                                    @if(isset($benefit['icon']))
                                        {!! $benefit['icon'] !!}
                                    @else
                                        <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            @if($loop->index == 0)
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                            @elseif($loop->index == 1)
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                            @elseif($loop->index == 2)
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            @else
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                            @endif
                                        </svg>
                                    @endif
                                </div>
                                <div class="pt-1">
                                    <p class="text-[10px] md:text-xs font-black uppercase tracking-[0.15em] mb-1" style="color: {{ $accentDark }};">{{ $benefit['label'] }}</p>
                                    <h3 class="font-bold text-lg md:text-xl text-slate-900 mb-2">{{ $benefit['title'] }}</h3>
                                    <p class="text-sm md:text-base text-slate-500 leading-relaxed">{{ $benefit['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Illustration & Value Proposition box (Right column like Alur Kerja illustration) -->
                <div data-aos="fade-left" class="relative flex flex-col items-center justify-center w-full max-w-lg mx-auto lg:max-w-none mt-16 md:mt-0">
                    <!-- Glow -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] rounded-full blur-[80px] opacity-40 z-0 pointer-events-none"
                        style="background: radial-gradient(circle, {{ $accentSoft }} 0%, transparent 70%);"></div>
                    
                    <img src="https://illustrations.popsy.co/{{ $illusColor }}/business-communication.svg" alt="Ilustrasi Keunggulan" onerror="this.src='https://illustrations.popsy.co/{{ $illusColor }}/success.svg'" class="relative z-10 w-full max-w-md h-auto drop-shadow-2xl hover:-translate-y-3 transition-transform duration-700 ease-out mb-8">

                    <!-- Box floating underneath -->
                    <div class="relative w-full z-20 rounded-2xl md:rounded-[2rem] p-6 md:p-8 border bg-white/90 backdrop-blur-md shadow-[0_20px_50px_rgba(15,23,42,0.08)] transform lg:-translate-y-10 hover:-translate-y-12 transition-transform duration-500 hover:shadow-[0_25px_60px_rgba(15,23,42,0.12)]"
                        style="border-color: {{ $accentBorder }}; border-top-width: 4px; border-top-color: {{ $accent }};">
                        <div class="flex items-center gap-3 mb-3 md:mb-4">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: {{ $accentSoft }}; color: {{ $accentDark }};">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <p class="text-sm md:text-base font-bold uppercase tracking-[0.2em]"
                                style="color: {{ $accentDark }};">Nilai Tambah</p>
                        </div>
                        <p class="text-base md:text-lg font-medium text-slate-800 leading-relaxed">{{ $valueProposition }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="py-16 md:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-10 md:mb-14" data-aos="fade-up">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-slate-900 mb-3 md:mb-4">Pilihan Paket</h2>
                <p class="text-base md:text-lg text-slate-500 leading-relaxed px-2">Pilih skema pengerjaan yang sesuai dengan kebutuhan Anda</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 items-center">
                @foreach ($packages as $package)
                    <div class="relative rounded-2xl md:rounded-[2rem] border bg-white p-6 md:p-8 shadow-[0_18px_50px_rgba(15,23,42,0.06)] transition-all duration-500 md:hover:-translate-y-3 hover:shadow-[0_25px_60px_var(--accent-shadow)] {{ !empty($package['featured']) ? 'border-transparent ring-2 py-8 lg:py-12' : 'border-slate-100' }}"
                        style="{{ !empty($package['featured']) ? 'ring-color: ' . $accent . '; box-shadow: 0 15px 40px ' . $accentShadow . ';' : '' }}"
                        data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 100 }}">
                        @if (!empty($package['featured']))
                            <div class="absolute -top-3 left-6 md:left-8 inline-flex rounded-full px-3 md:px-4 py-1.5 md:py-2 text-[10px] md:text-xs font-black uppercase tracking-[0.2em] text-white"
                                style="background-color: {{ $accent }};">Paling Diminati</div>
                        @endif

                        <div class="flex items-start justify-between gap-3 md:gap-4 mb-5 md:mb-6">
                            <div>
                                <p class="text-[11px] md:text-sm font-black uppercase tracking-[0.2em] md:tracking-[0.25em] mb-2 md:mb-3"
                                    style="color: {{ $accent }};">{{ $package['label'] }}</p>
                                <h3 class="text-xl md:text-2xl font-extrabold text-slate-900">{{ $package['title'] }}</h3>
                            </div>
                            <div class="w-12 h-12 md:w-14 md:h-14 rounded-xl md:rounded-2xl flex items-center justify-center text-lg md:text-xl font-black flex-shrink-0"
                                style="background-color: {{ $accentSoft }}; color: {{ $accent }};">
                                {!! $package['icon'] !!}
                            </div>
                        </div>

                        <p class="text-sm md:text-base text-slate-500 leading-relaxed mb-5 md:mb-6 md:min-h-[72px]">{{ $package['description'] }}</p>

                        <div class="rounded-xl md:rounded-[1.5rem] border p-4 md:p-5 mb-5 md:mb-6"
                            style="background-color: {{ $accentSoft }}; border-color: {{ $accentBorder }};">
                            <p class="text-[11px] md:text-sm font-semibold uppercase tracking-[0.1em] md:tracking-[0.2em] mb-1.5 md:mb-2"
                                style="color: {{ $accentDark }};">Harga mulai</p>
                            <p class="text-2xl sm:text-3xl md:text-4xl font-black text-slate-900">{{ $package['price'] }}</p>
                            <p class="text-xs md:text-sm text-slate-600 mt-1.5 md:mt-2">{{ $package['price_note'] }}</p>
                        </div>

                        <ul class="space-y-2.5 md:space-y-3 mb-6 md:mb-8">
                            @foreach ($package['features'] as $feature)
                                <li class="flex gap-2.5 md:gap-3 text-[13px] md:text-[15px] sm:text-base text-slate-600 leading-relaxed">
                                    <span
                                        class="mt-1 inline-flex h-4 w-4 md:h-5 md:w-5 items-center justify-center rounded-full text-white flex-shrink-0"
                                        style="background-color: {{ $accent }};">
                                        <svg class="w-2.5 h-2.5 md:w-3 md:h-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>

                        @if ($loop->index == 1)
                            <a href="{{ $ctaLink }}" target="_blank"
                                class="inline-flex w-full items-center justify-center rounded-full px-5 md:px-6 py-3.5 font-bold text-white transition hover:opacity-95 text-sm md:text-base"
                                style="background-color: {{ $accent }}; box-shadow: 0 10px 24px {{ $accentShadow }};">
                                {{ $package['cta'] ?? 'Pilih Paket Ini' }}
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="mt-8 text-center" data-aos="fade-up" data-aos-delay="100">
                <p class="text-xs md:text-sm text-slate-500 leading-relaxed px-4">{{ $pricingFootnote }}</p>
            </div>
        </div>
    </section>

    <section id="faq" class="py-16 md:py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 md:mb-12" data-aos="fade-up">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-slate-900 mb-3 md:mb-4">Pertanyaan Umum (FAQ)
                </h2>
                <p class="text-base md:text-lg text-slate-500 px-2">Ringkas, jelas, dan menjawab pertanyaan populer sebelum pengerjaan.</p>
            </div>
            <div class="space-y-3 md:space-y-4">
                @foreach ($faqs as $faq)
                    <details class="group rounded-xl md:rounded-[1.5rem] border border-slate-200 bg-slate-50/70 p-5 md:p-6"
                        data-aos="fade-up" data-aos-delay="{{ 100 + $loop->index * 50 }}">
                        <summary
                            class="flex cursor-pointer list-none items-center justify-between gap-3 text-base md:text-lg font-bold text-slate-900">
                            {{ $faq['question'] }}
                            <span class="text-lg md:text-2xl leading-none text-slate-400 transition group-open:rotate-45 ml-2 flex-shrink-0">+</span>
                        </summary>
                        <p class="pt-3 md:pt-4 text-sm md:text-base text-slate-500 leading-relaxed">{{ $faq['answer'] }}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-16 md:py-20 relative overflow-hidden mx-4 sm:mx-6 md:mx-auto md:max-w-none md:rounded-none rounded-3xl mb-8 md:mb-0">
        <div class="absolute inset-0"
            style="background: linear-gradient(135deg, {{ $accent }} 0%, {{ $accentDark }} 100%);"></div>
        <div class="absolute top-0 right-0 w-64 h-64 md:w-96 md:h-96 rounded-full blur-3xl bg-white/10 -mr-10 -mt-10 md:-mr-20 md:-mt-20"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 md:w-96 md:h-96 rounded-full blur-3xl bg-white/10 -ml-10 -mb-10 md:-ml-20 md:-mb-20"></div>

        <div class="max-w-4xl mx-auto px-4 relative z-10 text-center text-white">
            <p class="text-[11px] md:text-sm uppercase tracking-[0.2em] md:tracking-[0.3em] text-white/70 mb-3 md:mb-4 font-bold">Siap Memulai Project?</p>
            <h2 class="text-2xl sm:text-3xl md:text-5xl font-extrabold mb-4 md:mb-6 leading-tight">{{ $closingTitle }}</h2>
            <p class="text-sm sm:text-base md:text-lg text-white/80 mb-8 md:mb-10 max-w-2xl mx-auto leading-relaxed">{{ $closingDescription }}</p>
            <div class="flex flex-col sm:flex-row justify-center gap-3 md:gap-4">
                <a href="{{ $ctaLink }}" target="_blank"
                    class="inline-flex w-full sm:w-auto items-center justify-center rounded-full bg-white px-6 md:px-8 py-3.5 md:py-4 font-bold transition hover:bg-slate-100 text-sm md:text-base"
                    style="color: {{ $accentDark }};">
                    <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    {{ $closingPrimaryAction }}</a>
                <a href="{{ route('welcome') }}#layanan"
                    class="inline-flex w-full sm:w-auto items-center justify-center rounded-full border border-white/30 px-6 md:px-8 py-3.5 md:py-4 font-bold text-white transition hover:bg-white/10 text-sm md:text-base">Kembali
                    ke Layanan</a>
            </div>
        </div>
    </section>

    <footer class="bg-slate-50 border-t border-slate-200 pt-10 md:pt-14 pb-6 md:pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-5 md:gap-6 mb-6 md:mb-8">
                <div class="flex flex-col md:flex-row items-center gap-3">
                    <div class="w-16 md:w-20 text-white font-bold opacity-80 mix-blend-multiply">
                        <img src="{{ asset('images/logo.png') }}" alt="CodeByHasnan logo">
                    </div>
                    <span class="font-bold text-lg md:text-xl text-slate-900 mt-2 md:mt-0">CodeByHasnan</span>
                </div>
                <div class="text-xs md:text-sm text-slate-500 text-center md:text-right">
                    <p class="font-medium">{{ $footerTagline }}</p>
                    <p class="mt-1">{{ $footerSubline }}</p>
                </div>
            </div>
            <div
                class="border-t border-slate-200 pt-6 md:pt-8 flex flex-col items-center md:flex-row md:justify-between gap-2 md:gap-3 text-xs md:text-sm text-slate-400 md:text-slate-500">
                <p>&copy; {{ date('Y') }} Code By Hasnan. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 80,
            easing: 'ease-out-cubic'
        });
    </script>
</body>

</html>

<x-app-layout>
  <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-slate-800 leading-tight tracking-tight">
                    {{ __('Dashboard') }}
                </h2>
                <p class="text-sm text-slate-500 mt-1">Ringkasan aktivitas keuangan</p>
            </div>

            <form method="GET" class="relative z-20">
                <div class="flex items-center bg-white p-1.5 rounded-full border border-slate-200 shadow-sm shadow-slate-200/50 hover:shadow-md hover:border-blue-200 transition-all duration-300">
                    
                    <div class="relative group border-r border-slate-100 pr-2">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-slate-400 group-hover:text-blue-500 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <select name="month" 
                            class="appearance-none bg-transparent border-none py-2 pl-9 pr-8 text-sm font-semibold text-slate-600 hover:text-blue-600 focus:ring-0 cursor-pointer outline-none transition-colors w-32 md:w-40">
                            @foreach($months as $key => $label)
                                <option value="{{ $key }}" {{ (int)$selectedMonth === (int)$key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    
                    </div>

                    <div class="relative group pl-2">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-slate-400 group-hover:text-blue-500 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <select name="year" 
                            class="appearance-none bg-transparent border-none py-2 pl-9 pr-8 text-sm font-semibold text-slate-600 hover:text-blue-600 focus:ring-0 cursor-pointer outline-none transition-colors w-24 md:w-28">
                            @foreach($years as $year)
                                <option value="{{ $year }}" {{ (int)$selectedYear === (int)$year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                     
                    </div>

                    <button type="submit" class="ml-2 p-2 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-md hover:shadow-lg transition-all transform active:scale-95 flex items-center gap-2 px-4">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <span class="text-xs font-bold">Filter</span>
                    </button>
                    <button type="button"
                        onclick="openCleanupModal()"
                        class="ml-3 flex items-center gap-2 px-4 py-2 text-xs font-bold
                            bg-rose-600 text-white rounded-full
                            hover:bg-rose-700 transition-all shadow-md hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Bersihkan Data Lama
                    </button>
  




                    @if(request()->has('month') || request()->has('year'))
                        <a href="{{ route('dashboard') }}" 
                           title="Reset Filter"
                           class="ml-2 p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-full transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </a>
                    @endif

                </div>
            </form>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen px-10">
        <div class="mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100 p-8 relative overflow-hidden">
                <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h3 class="text-3xl font-extrabold text-slate-800">
                            Selamat Datang, <span class="text-blue-600">{{ Auth::user()->name }}</span>! 
                            {{-- <span class="inline-block hover:animate-spin cursor-default">👋</span> --}}
                        </h3>
                        <p class="text-slate-500 mt-2 text-lg">
                            Berikut adalah ringkasan aktivitas keuangan dan status siswa sekolah Anda hari ini.
                        </p>
                    </div>
                    
                    <div class="hidden md:flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 rounded-2xl text-sm font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Data untuk {{ $months[$selectedMonth] }} {{ $selectedYear }}
                    </div>

                </div>

                {{-- Decoration --}}
                <div class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-gradient-to-br from-blue-50 to-blue-100 rounded-full opacity-50 blur-3xl pointer-events-none"></div>
            </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 ">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-all group relative overflow-hidden">
                        <div class="absolute right-0 top-0 h-16 w-16 bg-blue-50 rounded-bl-full -mr-2 -mt-2 transition-transform group-hover:scale-110"></div>
                        <div class="relative">
                            <div class="flex items-center gap-4 mb-3">
                                <div class="p-3 bg-blue-100 text-blue-600 rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                    </svg>
                                </div>
                                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Projek Selesai</p>
                            </div>
                            <div class="flex items-baseline gap-1">
                                <p class="text-3xl font-extrabold text-blue-600 font-mono">{{ $totalProjekSelesai }}</p>
                                <p class="text-sm text-slate-400 font-medium">Projek</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-all group relative overflow-hidden">
                        <div class="absolute right-0 top-0 h-16 w-16 bg-emerald-50 rounded-bl-full -mr-2 -mt-2 transition-transform group-hover:scale-110"></div>
                        <div class="relative">
                            <div class="flex items-center gap-4 mb-3">
                                <div class="p-3 bg-emerald-100 text-emerald-600 rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                    </svg>
                                </div>
                                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Dana Masuk</p>
                            </div>
                            <div class="flex items-baseline gap-1">
                                <p class="text-sm text-slate-400 font-medium">Rp. </p>
                                <p class="text-3xl font-extrabold text-emerald-600 font-mono">{{ number_format($totalMasuk, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-all group relative overflow-hidden">
                        <div class="absolute right-0 top-0 h-16 w-16 bg-rose-50 rounded-bl-full -mr-2 -mt-2 transition-transform group-hover:scale-110"></div>
                        <div class="relative">
                            <div class="flex items-center gap-4 mb-3">
                                <div class="p-3 bg-rose-100 text-rose-600 rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                                    </svg>
                                </div>
                                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Dana Keluar</p>
                            </div>
                            <div class="flex items-baseline gap-1">
                                <p class="text-sm text-slate-400 font-medium">Rp. </p>
                            <p class="text-3xl font-extrabold text-red-600 font-mono">{{ number_format($totalKeluar, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-all group relative overflow-hidden">
                        <div class="absolute right-0 top-0 h-16 w-16 bg-violet-50 rounded-bl-full -mr-2 -mt-2 transition-transform group-hover:scale-110"></div>
                        <div class="relative">
                            <div class="flex items-center gap-4 mb-3">
                                <div class="p-3 bg-violet-100 text-violet-600 rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                </div>
                                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Saldo Akhir</p>
                            </div>
                            <div class="flex items-baseline gap-1">
                                <p class="text-sm text-slate-400 font-medium">Rp. </p>
                                <p class="text-3xl font-extrabold text-violet-600 font-mono">{{ number_format($saldo, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                </div>

                    <div class="bg-white shadow-xl shadow-slate-200/60 rounded-3xl overflow-hidden border border-slate-100">
                        
                        <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center bg-white">
                            <div>
                                <h3 class="font-bold text-xl text-slate-800">Aktivitas Keuangan Terbaru</h3>
                                <p class="text-sm text-slate-500 mt-1">
                                    5 transaksi terakhir bulan {{ $months[$selectedMonth] }} {{ $selectedYear }}.
                                </p>
                            </div>

                            <a href="{{ route('keuangan.index') }}" 
                            class="group flex items-center gap-1 text-sm text-blue-600 font-semibold hover:text-blue-700 transition">
                                Lihat Semua
                                <svg class="h-4 w-4 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 p-4">

                        {{-- LEFT COLUMN: AKTIVITAS TERBARU --}}
                        <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                            {{-- HEADER --}}
                            <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                                <h3 class="font-bold text-slate-800 flex items-center gap-2">
                                    <i data-feather="activity" class="w-4 h-4 text-blue-600"></i>
                                    Aktivitas Keuangan Terbaru
                                </h3>

                                <a href="{{ route('keuangan.index') }}"
                                class="text-xs font-bold text-blue-600 hover:text-blue-800">
                                    Lihat Semua →
                                </a>
                            </div>

                            {{-- TABLE --}}
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm text-left text-slate-600">
                                    <thead class="bg-slate-50 text-slate-500 uppercase font-bold text-xs">
                                        <tr>
                                            <th class="px-6 py-4">Tanggal</th>
                                            <th class="px-6 py-4 text-center">Jenis</th>
                                            <th class="px-6 py-4">Keterangan</th>
                                            <th class="px-6 py-4 text-right">Jumlah</th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-slate-100">
                                        @forelse($logs as $log)
                                            <tr class="hover:bg-slate-50/60 transition-colors">

                                                {{-- TANGGAL --}}
                                                <td class="px-6 py-4 whitespace-nowrap font-medium text-slate-700">
                                                    {{ $log->created_at->format('d M Y') }}
                                                    <div class="text-xs text-slate-400">
                                                        {{ $log->created_at->format('H:i') }}
                                                    </div>
                                                </td>

                                                {{-- JENIS --}}
                                                <td class="px-6 py-4 text-center">
                                                    @if($log->arus_dana === 'masuk')
                                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold
                                                                    bg-emerald-100 text-emerald-700">
                                                            <i data-feather="arrow-down-left" class="w-3 h-3 mr-1"></i>
                                                            Masuk
                                                        </span>
                                                    @else
                                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold
                                                                    bg-rose-100 text-rose-700">
                                                            <i data-feather="arrow-up-right" class="w-3 h-3 mr-1"></i>
                                                            Keluar
                                                        </span>
                                                    @endif
                                                </td>

                                                {{-- KETERANGAN --}}
                                                <td class="px-6 py-4 max-w-xs truncate">
                                                    {{ $log->keterangan ?? '-' }}
                                                </td>

                                                {{-- JUMLAH --}}
                                                <td class="px-6 py-4 text-right font-mono font-bold
                                                    {{ $log->arus_dana === 'masuk' ? 'text-emerald-600' : 'text-rose-600' }}">
                                                    {{ $log->arus_dana === 'masuk' ? '+' : '-' }}
                                                    Rp {{ number_format($log->jumlah, 0, ',', '.') }}
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="px-6 py-10 text-center text-slate-400">
                                                    Tidak ada transaksi terbaru.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- RIGHT COLUMN: RINGKASAN / AKSI --}}
                            <div class="space-y-6">

                                {{-- QUICK ACTION --}}
                            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                            <h3 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                                <i data-feather="zap" class="w-4 h-4 text-amber-500"></i>
                                Aksi Cepat
                            </h3>

                            {{-- BARIS ATAS --}}
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                {{-- TAMBAH PENGELUARAN --}}
                                <a href="{{ route('pengeluaran.create') }}"
                                class="group flex flex-col items-center justify-center p-4 rounded-2xl
                                        bg-rose-50 text-rose-700 border border-rose-100
                                        hover:bg-rose-600 hover:text-white transition-all">

                                    <i data-feather="arrow-up-right"
                                    class="w-6 h-6 mb-2 group-hover:scale-110 transition-transform"></i>

                                    <span class="text-xs font-bold text-center">Pengeluaran</span>
                                </a>
                                <a href="{{ route('keuangan.create', ['type' => 'masuk']) }}"
                                class="group flex flex-col items-center justify-center p-4 rounded-2xl
                                        bg-emerald-50 text-emerald-700 border border-emerald-100
                                        hover:bg-emerald-600 hover:text-white transition-all">

                                        <i data-feather="arrow-down-left"
                                    class="w-6 h-6 mb-2 group-hover:scale-110 transition-transform"></i>

                                    <span class="text-xs font-bold text-center">Pemasukan</span>
                                </a>

                            </div>
                                <a href="{{ route('projek.create') }}"
                                class="group flex flex-col items-center justify-center p-4 rounded-2xl
                                        bg-indigo-50 text-indigo-700 border border-indigo-100
                                        hover:bg-indigo-600 hover:text-white transition-all">

                                    <i data-feather="folder-plus"
                                    class="w-6 h-6 mb-2 group-hover:scale-110 transition-transform"></i>

                                    <span class="text-xs font-bold text-center">Tambah Projek</span>
                                </a>

                            {{-- BARIS BAWAH (LEBIH BESAR) --}}
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
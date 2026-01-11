<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-extrabold text-2xl text-gray-800 leading-tight tracking-tight">
                Manajemen Projek
            </h2>

            <nav class="flex text-sm font-medium text-gray-500">
                <span class="hover:text-blue-600 transition">Dashboard</span>
                <span class="mx-2">/</span>
                <span class="text-blue-600">Projek</span>
            </nav>
        </div>
    </x-slot>

    <div class="py-6 md:py-12 bg-slate-50 min-h-screen px-4 md:px-5">
        <div class="mx-auto sm:px-6 lg:px-8 space-y-6 md:space-y-8">

            {{-- ACTION BAR --}}
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h3 class="font-bold text-xl text-slate-800">Daftar Projek</h3>
                    <p class="text-sm text-slate-500">Kelola semua projek aktif dan selesai</p>
                </div>
                <div class="flex items-center gap-4">
                <form method="GET" action="{{ route('projek.index') }}" class="flex items-center gap-2">
                    <select name="status"
                        onchange="this.form.submit()"
                        class="px-9 py-2 rounded-xl text-sm font-bold border border-slate-200 bg-white
                            text-slate-700 hover:border-blue-400 focus:ring-2 focus:ring-blue-200 transition">
                        <option value="">Semua Status</option>
                        <option value="proses" {{ request('status')=='proses' ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ request('status')=='selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>Pending</option>
                        <option value="batal" {{ request('status')=='batal' ? 'selected' : '' }}>Batal</option>
                    </select>

                    @if(request('status'))
                        <a href="{{ route('projek.index') }}"
                        class="px-3 py-2 text-xs font-bold text-slate-500 hover:text-red-600
                                hover:bg-red-50 rounded-xl transition">
                            Reset
                        </a>
                    @endif
                </form>

                <a href="{{ route('projek.create') }}"
                   class="group inline-flex items-center gap-2 px-6 py-2 bg-blue-600 text-white text-sm font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:bg-blue-700 hover:shadow-blue-600/40 transition-all duration-300 transform hover:-translate-y-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5 transition-transform group-hover:rotate-90"
                         viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                              clip-rule="evenodd" />
                    </svg>
                    Tambah Projek
                </a>
                </div>
            </div>

            {{-- GRID CARD PROJEK --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($projeks as $projek)
                    @php
                        $statusColor = match (strtolower($projek->status)) {
                            'selesai' => 'emerald',
                            'proses', 'on progress' => 'blue',
                            'pending' => 'amber',
                            'batal', 'cancelled' => 'red',
                            default => 'slate'
                        };

                        $statusIcon = match (strtolower($projek->status)) {
                            'selesai' => 'M5 13l4 4L19 7',
                            'proses', 'on progress' => 'M13 10V3L4 14h7v7l9-11h-7z',
                            'pending' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                            'batal', 'cancelled' => 'M6 18L18 6M6 6l12 12',
                            default => 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
                        };
                    @endphp

                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition-all group relative overflow-hidden flex flex-col justify-between h-full">
                        {{-- Dekorasi --}}
                        <div class="absolute right-0 top-0 h-20 w-20 bg-{{ $statusColor }}-50 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>

                        <div class="relative z-10">
                            {{-- Header --}}
                            <div class="flex justify-between items-start mb-4">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold border bg-{{ $statusColor }}-50 text-{{ $statusColor }}-700 border-{{ $statusColor }}-200">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-3.5 h-3.5"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor"
                                         stroke-width="2.5">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="{{ $statusIcon }}" />
                                    </svg>
                                    {{ ucfirst($projek->status) }}
                                </span>

                                {{-- Dropdown --}}
                                  <div x-data="{ open: false }" class="relative">
                                    <button @click="open = !open" @click.away="open = false" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg hover:bg-slate-50 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                        </svg>
                                    </button>
                                    <div x-show="open" class="absolute right-0 mt-2 w-32 bg-white rounded-xl shadow-lg border border-slate-100 py-1 z-20" style="display: none;">
                                        <a href="{{ route('projek.edit', $projek->id) }}" class="block px-4 py-2 text-sm text-slate-600 hover:bg-blue-50 hover:text-blue-600">Edit</a>
                                        <form action="{{ route('projek.destroy', $projek->id) }}" method="POST" onsubmit="return confirm('Hapus projek ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-rose-600 hover:bg-rose-50">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Konten --}}
                            <h4 class="text-lg font-bold text-slate-800 mb-1 line-clamp-2">
                                {{ $projek->nama }}
                            </h4>

                            <p class="text-xs text-slate-500 font-medium uppercase tracking-wider mb-4">
                                {{ $projek->jenis }}
                            </p>

                            <div class="mb-6">
                                <p class="text-sm text-slate-400">Nilai Projek</p>
                                <p class="text-2xl font-extrabold text-slate-800 font-mono">
                                    Rp {{ number_format($projek->harga, 0, ',', '.') }}
                                </p>
                            </div>

                             <div class="space-y-3 pt-4 border-t border-slate-100">
                                {{-- ITEM 1: KLIEN --}}
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-slate-50 text-slate-500 rounded-lg">
                                        {{-- Icon User --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-slate-400">Klien</p>
                                        <p class="text-sm font-semibold text-slate-700">
                                            {{ $projek->nama_customer }}
                                        </p>
                                    </div>
                                </div>

                                {{-- ITEM 2: DEADLINE --}}
                                <div class="flex items-center gap-3">
                                    {{-- Added text-slate-500 for consistency --}}
                                    <div class="p-2 bg-slate-50 text-slate-500 rounded-lg">
                                        {{-- Icon Calendar --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-slate-400">Deadline</p>
                                        <p class="text-sm font-semibold text-slate-700">
                                            {{ \Carbon\Carbon::parse($projek->deadline)->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full flex flex-col items-center justify-center py-16 bg-white rounded-3xl border border-dashed border-slate-300">
                        <h3 class="text-lg font-bold text-slate-700">Belum ada projek</h3>
                        <p class="text-slate-500 text-sm mb-6">Mulai dengan menambahkan projek baru</p>
                        <a href="{{ route('projek.create') }}"
                           class="px-5 py-2 bg-blue-600 text-white rounded-xl text-sm font-bold hover:bg-blue-700 transition">
                            Buat Projek Baru
                        </a>
                    </div>
                @endforelse
            </div>

            @if($projeks->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                    {{ $projeks->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>

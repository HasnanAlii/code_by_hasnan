<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-extrabold text-2xl text-gray-800 leading-tight tracking-tight">
                Manajemen Pengeluaran
            </h2>

            <nav class="flex text-sm font-medium text-gray-500">
                <span class="hover:text-blue-600 transition">Dashboard</span>
                <span class="mx-2">/</span>
                <span class="text-blue-600">Pengeluaran</span>
            </nav>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen px-10">
        <div class="mx-auto sm:px-6 lg:px-8 space-y-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="hidden md:block"></div>
        {{-- CARD JUMLAH TRANSAKSI --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17v-2a4 4 0 014-4h4m-6 6h6m-6 4h6M7 7h10M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium">Jumlah Pengeluaran</p>
                <h3 class="text-2xl font-bold text-gray-800">
                    {{ $jumlahPengeluaran }} Pengeluaran
                </h3>
            </div>
        </div>

        {{-- CARD TOTAL PENGELUARAN --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-red-100 flex items-center gap-4">
            <div class="p-3 bg-red-50 text-red-600 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium">Total Pengeluaran</p>
                <h3 class="text-2xl font-bold text-gray-800">
                    Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
                </h3>
            </div>
        </div>
    </div>

            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
                {{-- Header Tabel & Tombol Tambah --}}
                <div class="px-6 py-5 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4 bg-white">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-red-100 text-red-600 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-700 text-lg">Riwayat Transaksi</h3>
                    </div>
                             <div class="flex items-center gap-4 flex-wrap">                                
                            @php
                                $filters = [
                                    'harian' => 'Harian',
                                    'bulanan' => 'Bulanan',
                                    'tahunan' => 'Tahunan'
                                ];
                                $currentFilter = request('filter');
                                $selectedTanggal = request('tanggal');
                                $selectedBulan = request('bulan'); 
                                $selectedTahun = request('tahun'); 
                            @endphp

                            <div class="flex flex-wrap items-center gap-2 bg-slate-100/50 p-1.5 rounded-2xl border border-slate-200/60">
                                <a href="{{ route('pengeluaran.index') }}"
                                class="px-4 py-2 rounded-xl text-xs md:text-sm font-bold transition-all duration-200 ease-in-out
                                {{ !$currentFilter && !$selectedTanggal && !$selectedBulan && !$selectedTahun ? 'bg-white text-slate-800 shadow-sm ring-1 ring-slate-200' : 'text-slate-500 hover:text-slate-700 hover:bg-slate-200/50' }}">
                                    Semua
                                </a>

                                @foreach($filters as $key => $label)
                                    <a href="{{ route('pengeluaran.index', array_merge(request()->except('page','filter','tanggal','bulan','tahun'), ['filter' => $key])) }}"
                                    class="filter-btn px-4 py-2 rounded-xl text-xs md:text-sm font-bold transition-all duration-200 ease-in-out
                                    {{ ($currentFilter == $key) ? 'bg-white text-slate-800 shadow-sm ring-1 ring-slate-200' : 'text-slate-500 hover:text-slate-700 hover:bg-slate-200/50' }}"
                                    data-filter="{{ $key }}">
                                        {{ $label }}
                                    </a>
                                @endforeach

                                <form id="filter-form" action="{{ route('pengeluaran.index') }}" method="GET" class="flex items-center gap-2 ml-1">
                                    @foreach(request()->except('page','tanggal','bulan','tahun','filter') as $name => $value)
                                        <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                                    @endforeach

                                    <input type="hidden" name="filter" id="filter-input" value="{{ $currentFilter }}">

                                    <input id="tanggal" name="tanggal" type="date" value="{{ $selectedTanggal }}"
                                        class="date-input px-3 py-2 rounded-xl text-xs md:text-sm border border-slate-200/60 bg-white shadow-sm focus:outline-none hidden" />

                                    <input id="bulan" name="bulan" type="month" value="{{ $selectedBulan }}"
                                        class="month-input px-3 py-2 rounded-xl text-xs md:text-sm border border-slate-200/60 bg-white shadow-sm focus:outline-none hidden" />

                                    <input id="tahun" name="tahun" type="number" min="1900" max="2099" step="1" value="{{ $selectedTahun ?? date('Y') }}"
                                        class="year-input px-3 py-2 rounded-xl text-xs md:text-sm border border-slate-200/60 bg-white shadow-sm focus:outline-none hidden" />

                                    <button type="submit"
                                                class="apply-btn px-3 py-2 rounded-xl text-xs md:text-sm font-bold text-white transition-all duration-200 ease-in-out bg-blue-600 shadow-sm ring-1 ring-slate-200">
                                        Terapkan
                                    </button>

                                    @if($selectedTanggal || $selectedBulan || $selectedTahun || $currentFilter)
                                        <a href="{{ route('pengeluaran.index', request()->except('page','tanggal','bulan','tahun','filter')) }}"
                                        class="px-3 py-2 rounded-xl text-xs md:text-sm font-semibold transition-all duration-200 ease-in-out text-slate-500 hover:text-slate-700 hover:bg-slate-200/50">
                                            Reset
                                        </a>
                                    @endif
                                </form>
                            </div>

                            <script>
                                (function(){
                                    const currentFilter = "{{ $currentFilter }}";
                                    const filterInput = document.getElementById('filter-input');
                                    const tanggal = document.getElementById('tanggal');
                                    const bulan = document.getElementById('bulan');
                                    const tahun = document.getElementById('tahun');

                                    function showFor(filter) {
                                        tanggal.classList.add('hidden');
                                        bulan.classList.add('hidden');
                                        tahun.classList.add('hidden');

                                        filterInput.value = filter || '';

                                        if (filter === 'harian') {
                                            tanggal.classList.remove('hidden');
                                        } else if (filter === 'bulanan') {
                                            bulan.classList.remove('hidden');
                                        } else if (filter === 'tahunan') {
                                            tahun.classList.remove('hidden');
                                        } else {
                                        }
                                    }

                                    showFor(currentFilter);

                                    document.querySelectorAll('.filter-btn').forEach(btn => {
                                        btn.addEventListener('click', function(e){
                                            e.preventDefault(); 
                                            const f = this.dataset.filter;
                                            showFor(f);
                                            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('bg-white','text-slate-800','shadow-sm','ring-1','ring-slate-200'));
                                            this.classList.add('bg-white','text-slate-800','shadow-sm','ring-1','ring-slate-200');
                                            filterInput.value = f;
                                        });
                                    });

                                })();
                            </script>

                                <a href="{{ route('pengeluaran.export.pdf', request()->query()) }}" target="_blank"
                                    class="group flex items-center justify-center gap-2 w-full md:w-auto px-5 py-2.5 bg-rose-600 text-white text-sm font-bold rounded-xl shadow-lg shadow-rose-500/30 hover:bg-rose-700 hover:shadow-rose-600/40 transition-all duration-300 transform hover:-translate-y-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span>Export PDF</span>
                                </a>
                                <a href="{{ route('pengeluaran.create') }}" 
                                   class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-200 transition-all duration-300 flex items-center gap-2 transform hover:-translate-y-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                    Catat Pengeluaran
                                </a>
                    </div>
                </div>
                     
            
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 uppercase text-xs font-bold tracking-wider">
                                <th class="px-6 py-4">No</th>
                                <th class="px-6 py-4">Tanggal</th>
                                <th class="px-6 py-4">Keterangan</th>
                                <th class="px-6 py-4 text-right">Jumlah (Rp)</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($pengeluaran as $index => $item)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    {{-- Nomor Urut --}}
                                    <td class="px-6 py-4 text-gray-500 font-medium">
                                        {{ $loop->iteration }}
                                    </td>
                                    
                                    {{-- Tanggal (Format: 09 Jan 2026) --}}
                                    <td class="px-6 py-4 text-gray-600 whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{-- Asumsi kolom database bernama 'tanggal' atau 'created_at' --}}
                                            {{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('d M Y') }}
                                        </div>
                                    </td>

                                    {{-- Keterangan --}}
                                    <td class="px-6 py-4 text-gray-800 font-semibold">
                                        {{ $item->keterangan }}
                                    </td>

                                    {{-- Jumlah (Format Merah) --}}
                                    <td class="px-6 py-4 text-right">
                                        <span class="inline-block px-3 py-1 bg-red-50 text-red-600 rounded-full font-bold text-sm border border-red-100">
                                            - Rp {{ number_format($item->jumlah, 0, ',', '.') }}
                                        </span>
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center items-center gap-2">
                                            {{-- Edit --}}
                                            <a href="{{ route('pengeluaran.edit', $item->id) }}" 
                                                 class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg">
                                                <i data-feather="edit"></i>
                                            </a>
                                            
                                            {{-- Delete --}}
                                            <form action="{{ route('pengeluaran.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg">
                                                    <i data-feather="trash-2"></i>
                                                </button>
                                            </form>
                                         
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-gray-500 bg-white">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="p-3 bg-gray-100 rounded-full mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                            <p class="font-medium">Belum ada data pengeluaran.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
                {{-- Pagination (Jika ada) --}}
                @if($pengeluaran->hasPages())
                    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                        {{ $pengeluaran->links() }}
                    </div>
                @endif
            </div>
        </div>

        </div>
    </div>
</x-app-layout>
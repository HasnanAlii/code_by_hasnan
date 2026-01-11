<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-extrabold text-2xl text-gray-800 leading-tight tracking-tight">
                Manajemen Keuangan
            </h2>
            <nav class="flex text-sm font-medium text-gray-500">
                <span class="hover:text-blue-600 transition">Dashboard</span>
                <span class="mx-2">/</span>
                <span class="text-blue-600">Keuangan</span>
            </nav>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen px-5">
        <div class="mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- SUMMARY --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- PEMASUKAN --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border relative overflow-hidden">
                    <div class="absolute right-0 top-0 h-24 w-24 bg-emerald-50 rounded-bl-full -mr-4 -mt-4"></div>
                    <div class="relative">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="p-3 bg-emerald-100 text-emerald-600 rounded-xl">
                                {{-- SVG --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            </div>
                            <p class="text-sm font-bold text-slate-500 uppercase tracking-wider">
                                Total Pemasukan
                            </p>
                        </div>

                        <p class="text-3xl font-extrabold text-emerald-600 font-mono">
                            Rp {{ number_format($pemasukan, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                {{-- PENGELUARAN --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border relative overflow-hidden">
                    <div class="absolute right-0 top-0 h-24 w-24 bg-rose-50 rounded-bl-full -mr-4 -mt-4"></div>
                    <div class="relative">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="p-3 bg-rose-100 text-rose-600 rounded-xl">
                                {{-- SVG --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 17h8m0 0V9m0 8l-8-8-4 4-6 6"/>
                                </svg>
                            </div>
                            <p class="text-sm font-bold text-slate-500 uppercase tracking-wider">
                                Total Pengeluaran
                            </p>
                        </div>

                        <p class="text-3xl font-extrabold text-rose-600 font-mono">
                            Rp {{ number_format($pengeluaran, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                {{-- SALDO --}}
                <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl p-6 shadow-lg text-white">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 bg-white/20 rounded-xl">
                            {{-- SVG --}}
                       <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                        </div>
                        <p class="text-sm font-bold uppercase tracking-wider text-blue-100">
                            Saldo
                        </p>
                    </div>

                    <p class="text-3xl font-extrabold font-mono">
                        Rp {{ number_format($saldo, 0, ',', '.') }}
                    </p>
                </div>

            </div>
            

            {{-- TABLE --}}
          <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
                <div class="px-4 md:px-6 py-4 md:py-5 border-b border-gray-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-3 md:gap-4 bg-white">
                      <div class="flex items-center gap-3">
                        <div class="p-2 bg-green-100 text-green-600 rounded-lg">
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
                                <a href="{{ route('keuangan.index') }}"
                                class="px-4 py-2 rounded-xl text-xs md:text-sm font-bold transition-all duration-200 ease-in-out
                                {{ !$currentFilter && !$selectedTanggal && !$selectedBulan && !$selectedTahun ? 'bg-white text-slate-800 shadow-sm ring-1 ring-slate-200' : 'text-slate-500 hover:text-slate-700 hover:bg-slate-200/50' }}">
                                    Semua
                                </a>

                                @foreach($filters as $key => $label)
                                    <a href="{{ route('keuangan.index', array_merge(request()->except('page','filter','tanggal','bulan','tahun'), ['filter' => $key])) }}"
                                    class="filter-btn px-4 py-2 rounded-xl text-xs md:text-sm font-bold transition-all duration-200 ease-in-out
                                    {{ ($currentFilter == $key) ? 'bg-white text-slate-800 shadow-sm ring-1 ring-slate-200' : 'text-slate-500 hover:text-slate-700 hover:bg-slate-200/50' }}"
                                    data-filter="{{ $key }}">
                                        {{ $label }}
                                    </a>
                                @endforeach

                                <form id="filter-form" action="{{ route('keuangan.index') }}" method="GET" class="flex items-center gap-2 ml-1">
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
                                        <a href="{{ route('keuangan.index', request()->except('page','tanggal','bulan','tahun','filter')) }}"
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

                                <a href="{{ route('keuangan.export.pdf', request()->query()) }}" target="_blank"
                                    class="group flex items-center justify-center gap-2 w-full md:w-auto px-5 py-2.5 bg-rose-600 text-white text-sm font-bold rounded-xl shadow-lg shadow-rose-500/30 hover:bg-rose-700 hover:shadow-rose-600/40 transition-all duration-300 transform hover:-translate-y-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span>Export PDF</span>
                                </a>
                                <a href="{{ route('keuangan.create') }}" 
                                    class="group flex items-center justify-center gap-2 w-full md:w-auto px-5 py-2.5 bg-blue-600 text-white text-sm font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:bg-blue-700 hover:shadow-blue-600/40 transition-all duration-300 transform hover:-translate-y-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                    Catat Keuangan
                                </a>
                                
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-6 py-4 text-center text-xs font-bold uppercase">No</th>
                                <th class="px-6 py-4 text-center text-xs font-bold uppercase">Tanggal</th>
                                <th class="px-6 py-4 text-center text-xs font-bold uppercase">Jenis</th>
                                <th class="px-6 py-4 text-right text-xs font-bold uppercase">Jumlah</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase">Keterangan</th>
                                <th class="px-6 py-4 text-center text-xs font-bold uppercase">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($keuangans as $keuangan)
                                <tr class="hover:bg-blue-50/40">
                                    <td class="px-6 py-4 text-center text-sm text-slate-400">
                                        {{ $loop->iteration }}
                                    </td>


                                    <td class="px-6 py-4 item-center justify-center text-gray-600 whitespace-nowrap">
                                        <div class="flex items-center gap-2 item-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{-- Asumsi kolom database bernama 'tanggal' atau 'created_at' --}}
                                            {{ \Carbon\Carbon::parse($keuangan->created_at)->translatedFormat('d M Y') }}
                                        </div>
                                    </td>


                                    <td class="px-6 py-4 text-center">
                                        @if($keuangan->jenis === 'masuk')
                                            <span class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-medium text-emerald-700">
                                                Masuk
                                            </span>
                                        @else
                                            <span class="inline-flex items-center rounded-full bg-rose-50 px-2.5 py-0.5 text-xs font-medium text-rose-700">
                                                Keluar
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 text-right font-bold font-mono
                                        {{ $keuangan->jenis === 'masuk' ? 'text-emerald-600' : 'text-rose-600' }}">
                                        {{ $keuangan->jenis === 'masuk' ? '+' : '-' }}
                                        Rp {{ number_format($keuangan->jumlah, 0, ',', '.') }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-slate-600 max-w-xs truncate">
                                        {{ $keuangan->keterangan ?? '-' }}
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center gap-2">
                                            {{-- <a href="{{ route('keuangan.show', $keuangan) }}"
                                               class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg">
                                                <i data-feather="eye"></i>
                                            </a> --}}
                                            <a href="{{ route('keuangan.edit', $keuangan) }}"
                                               class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <form action="{{ route('keuangan.destroy', $keuangan) }}"
                                                  method="POST" onsubmit="return confirm('Hapus transaksi ini?')">
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
                                    <td colspan="6" class="py-16 text-center text-slate-500">
                                        Tidak ada data transaksi
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-6">
                    {{ $keuangans->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
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
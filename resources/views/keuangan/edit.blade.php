<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-extrabold text-2xl text-gray-800 leading-tight tracking-tight">
                Edit Keuangan
            </h2>

            <nav class="flex text-sm font-medium text-gray-500">
                <span class="hover:text-blue-600 transition">Dashboard</span>
                <span class="mx-2">/</span>
                <span class="hover:text-blue-600 transition">Keuangan</span>
                <span class="mx-2">/</span>
                <span class="text-blue-600">Edit Keuangan</span>
            </nav>
        </div>
    </x-slot>
    
    <div class="py-12 bg-gray-50 min-h-screen px-5">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-blue-100">

                {{-- FORM HEADER --}}
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex justify-between items-center">
                    <span class="text-gray-600 font-medium flex items-center gap-2">
                        <div class="p-2 bg-amber-100 rounded-lg text-amber-600">
                            {{-- Icon Edit --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </div>
                        Edit Data Transaksi
                    </span>

                    <a href="{{ route('keuangan.index') }}"
                       class="text-sm text-blue-600 hover:text-blue-800 flex items-center gap-1 font-bold transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Kembali
                    </a>
                </div>

                <div class="p-6 md:p-8">
                    <form method="POST" action="{{ route('keuangan.update', $keuangan->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="space-y-8">

                            {{-- 1. JENIS TRANSAKSI --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-3 flex items-center gap-2">
                                    <span class="bg-blue-100 text-blue-700 w-6 h-6 rounded-full flex items-center justify-center text-xs">1</span>
                                    Jenis Transaksi *
                                </label>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                    {{-- PEMASUKAN --}}
                                    <label class="cursor-pointer group">
                                        <input type="radio"
                                               name="jenis"
                                               value="masuk"
                                               class="peer sr-only"
                                               {{ $keuangan->jenis === 'masuk' ? 'checked' : '' }}>

                                        <div class="p-4 rounded-xl border-2 flex items-center gap-3 transition-all
                                                    border-gray-200 hover:border-green-300
                                                    peer-checked:border-green-500 peer-checked:bg-green-50">

                                            <div class="p-2 rounded-lg bg-green-100 text-green-600
                                                        peer-checked:bg-green-500 peer-checked:text-white transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                                </svg>
                                            </div>

                                            <div>
                                                <span class="block font-bold">Pemasukan</span>
                                                <span class="block text-xs text-gray-500">Dana masuk</span>
                                            </div>
                                        </div>
                                    </label>

                                    {{-- PENGELUARAN --}}
                                    <label class="cursor-pointer group">
                                        <input type="radio"
                                               name="jenis"
                                               value="keluar"
                                               class="peer sr-only"
                                               {{ $keuangan->jenis === 'keluar' ? 'checked' : '' }}>

                                        <div class="p-4 rounded-xl border-2 flex items-center gap-3 transition-all
                                                    border-gray-200 hover:border-red-300
                                                    peer-checked:border-red-500 peer-checked:bg-red-50">

                                            <div class="p-2 rounded-lg bg-red-100 text-red-600
                                                        peer-checked:bg-red-500 peer-checked:text-white transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/>
                                                </svg>
                                            </div>

                                            <div>
                                                <span class="block font-bold">Pengeluaran</span>
                                                <span class="block text-xs text-gray-500">Dana keluar</span>
                                            </div>
                                        </div>
                                    </label>

                                </div>

                                @error('jenis')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- 2. JUMLAH --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="bg-blue-100 text-blue-700 w-6 h-6 rounded-full flex items-center justify-center text-xs">2</span>
                                    Nominal Transaksi *
                                </label>

                                <div class="relative rounded-xl shadow-sm">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                        <span class="text-gray-500 font-bold">Rp</span>
                                    </div>

                                    {{-- ADDED 'border' CLASS HERE --}}
                                    <input type="text"
                                           id="jumlah_display"
                                           class="pl-12 block w-full border border-gray-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 font-bold text-lg transition"
                                           value="{{ number_format($keuangan->jumlah, 0, ',', '.') }}"
                                           required>

                                    <input type="hidden"
                                           name="jumlah"
                                           id="jumlah"
                                           value="{{ $keuangan->jumlah }}">
                                </div>

                                @error('jumlah')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- 3. KETERANGAN --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="bg-blue-100 text-blue-700 w-6 h-6 rounded-full flex items-center justify-center text-xs">3</span>
                                    Keterangan
                                </label>

                                {{-- ADDED 'border' CLASS HERE --}}
                                <textarea name="keterangan"
                                          rows="3"
                                          class="block w-full border border-gray-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 transition"
                                          placeholder="Masukan keterangan">{{ old('keterangan', $keuangan->keterangan) }}</textarea>

                                @error('keterangan')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- ACTION --}}
                            <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                                <a href="{{ route('keuangan.index') }}"
                                   class="px-5 py-2.5 bg-gray-200 text-gray-700 font-semibold rounded-xl hover:bg-gray-300 transition duration-300">
                                    Batal
                                </a>

                                <button type="submit"
                                        class="px-6 py-2.5 bg-blue-600 text-white font-bold rounded-xl shadow-lg
                                               hover:bg-blue-700 transition-all duration-300 transform hover:-translate-y-0.5
                                               flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                    </svg>
                                    Update Transaksi
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- FORMAT RUPIAH --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const display = document.getElementById('jumlah_display');
            const hidden  = document.getElementById('jumlah');

            function formatRupiah(val) {
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            display.addEventListener('input', () => {
                let raw = display.value.replace(/\D/g, '');
                
                if (raw === "") {
                    hidden.value = "";
                    display.value = "";
                    return;
                }

                hidden.value = raw;
                display.value = formatRupiah(raw);
            });
        });
    </script>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-extrabold text-2xl text-gray-800 leading-tight tracking-tight">
                Tambah Pengeluaran
            </h2>

            <nav class="flex text-sm font-medium text-gray-500">
                <span class="hover:text-blue-600 transition">Dashboard</span>
                <span class="mx-2">/</span>
                <span class="hover:text-blue-600 transition">Pengeluaran</span>
                <span class="mx-2">/</span>
                <span class="text-blue-600">Tambah Pengeluaran</span>
            </nav>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen px-5">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Mengubah border-red-100 menjadi border-blue-100 agar konsisten --}}
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-blue-100">

                {{-- FORM HEADER --}}
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex justify-between items-center">
                    <span class="text-gray-600 font-medium flex items-center gap-2">
                        {{-- Icon Background Blue --}}
                        <div class="p-2 bg-blue-100 rounded-lg text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        Formulir Pengeluaran
                    </span>

                    <a href="{{ route('pengeluaran.index') }}" 
                       class="text-sm text-blue-600 hover:text-blue-800 flex items-center gap-1 font-bold transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Kembali
                    </a>
                </div>

                <div class="p-6 md:p-8">
                    <form method="POST" action="{{ route('pengeluaran.store') }}">
                        @csrf

                        <div class="space-y-8">
                            
                            {{-- 1. NOMINAL --}}
                            <div>
                                <label for="jumlah" class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="bg-blue-100 text-blue-700 w-6 h-6 rounded-full flex items-center justify-center text-xs">1</span>
                                    Nominal Pengeluaran *
                                </label>
                                <div class="relative rounded-xl shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                        <span class="text-gray-500 font-bold">Rp</span>
                                    </div>

                                    {{-- Mengubah style input agar konsisten (border-gray-300, text-lg) --}}
                                    <input type="text" id="jumlah_display"
                                           class="pl-12 block w-full border border-gray-300 rounded-xl shadow-sm 
                                           focus:border-blue-500 focus:ring-blue-500 
                                           py-3 font-bold text-gray-800 text-lg transition"
                                           placeholder="0" required>

                                    <input type="hidden" name="jumlah" id="jumlah">
                                </div>
                                @error('jumlah') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            
                            {{-- 2. DETAIL --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="bg-blue-100 text-blue-700 w-6 h-6 rounded-full flex items-center justify-center text-xs">2</span>
                                    Detail Transaksi
                                </label>
                                
                                {{-- Keterangan --}}
                                <label for="keterangan" class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Keterangan *</label>
                                <textarea name="keterangan" id="keterangan" rows="3" required
                                       class="block w-full border border-gray-300 rounded-xl shadow-sm 
                                       focus:border-blue-500 focus:ring-blue-500 
                                       py-3 px-4 transition"
                                       placeholder="Masukan keterangan pengeluaran">{{ old('keterangan') }}</textarea>
                                @error('keterangan') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                                <p class="mt-2 text-xs text-gray-500 flex items-center gap-1">
                                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Jelaskan detail pengeluaran untuk keperluan laporan.
                                </p>
                            </div>

                            {{-- TOMBOL AKSI --}}
                             <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                                <a href="{{ route('pengeluaran.index') }}"
                                   class="px-5 py-2.5 bg-gray-200 text-gray-700 font-semibold rounded-xl hover:bg-gray-300 transition duration-300">
                                    Batal
                                </a>
                                <button type="submit"
                                        class="px-6 py-2.5 bg-blue-600 text-white font-bold rounded-xl shadow-lg hover:bg-blue-700 hover:shadow-blue-200 transition-all duration-300 transform hover:-translate-y-0.5 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                    </svg>
                                    Simpan 
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Script Format Rupiah --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const displayInput = document.getElementById("jumlah_display");
            const realInput = document.getElementById("jumlah");

            function formatRupiah(angka) {
                return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            displayInput.addEventListener("input", function () {
                let value = this.value.replace(/\D/g, ""); 
                if (value === "") {
                    realInput.value = "";
                    this.value = "";
                    return;
                }
                realInput.value = value;
                this.value = formatRupiah(value);
            });
        });
    </script>
</x-app-layout>
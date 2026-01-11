<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-extrabold text-2xl text-gray-800 leading-tight tracking-tight">
                Edit Projek
            </h2>

            <nav class="flex text-sm font-medium text-gray-500">
                <span class="hover:text-blue-600 transition">Dashboard</span>
                <span class="mx-2">/</span>
                <span class="hover:text-blue-600 transition">Projek</span>
                <span class="mx-2">/</span>
                <span class="text-blue-600">Edit Projek</span>
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
                            {{-- Icon Edit (Pencil) --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </div>
                        Edit Data Projek: <span class="font-bold text-gray-800 ml-1">{{ $projek->nama }}</span>
                    </span>

                    <a href="{{ route('projek.index') }}" 
                       class="text-sm text-blue-600 hover:text-blue-800 flex items-center gap-1 font-bold transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Kembali
                    </a>
                </div>

                <div class="p-6 md:p-8">
                    {{-- Perhatikan rute update dan method PUT --}}
                    <form method="POST" action="{{ route('projek.update', $projek->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="space-y-8">
                            
                            {{-- 1. INFORMASI DASAR --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-4 flex items-center gap-2">
                                    <span class="bg-blue-100 text-blue-700 w-6 h-6 rounded-full flex items-center justify-center text-xs">1</span>
                                    Informasi Projek
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    {{-- Nama Projek --}}
                                    <div>
                                        <label for="nama" class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Nama Projek *</label>
                                        {{-- ADDED 'border' CLASS HERE --}}
                                        <input type="text" name="nama" id="nama" required 
                                               value="{{ old('nama', $projek->nama) }}"
                                               class="block w-full border border-gray-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 transition"
                                               placeholder="Contoh: Website Company Profile">
                                        @error('nama') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                                    </div>

                                    {{-- Jenis Projek --}}
                                    <div>
                                        <label for="jenis" class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Jenis / Kategori *</label>
                                        {{-- ADDED 'border' CLASS HERE --}}
                                        <input type="text" name="jenis" id="jenis" required 
                                               value="{{ old('jenis', $projek->jenis) }}"
                                               class="block w-full border border-gray-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 transition"
                                               placeholder="Contoh: Web Development, SEO, Desain">
                                        @error('jenis') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>

                            <hr class="border-gray-100">

                            {{-- 2. KLIEN & WAKTU --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-4 flex items-center gap-2">
                                    <span class="bg-blue-100 text-blue-700 w-6 h-6 rounded-full flex items-center justify-center text-xs">2</span>
                                    Klien & Waktu
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    {{-- Nama Customer --}}
                                    <div>
                                        <label for="nama_customer" class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Nama Klien / Customer *</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>
                                            {{-- ADDED 'border' CLASS HERE --}}
                                            <input type="text" name="nama_customer" id="nama_customer" required 
                                                   value="{{ old('nama_customer', $projek->nama_customer) }}"
                                                   class="pl-10 block w-full border border-gray-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 transition"
                                                   placeholder="Nama Perusahaan / Perorangan">
                                        </div>
                                        @error('nama_customer') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                                    </div>

                                    {{-- Deadline --}}
                                 <div>
                                    <label for="deadline"
                                        class="block text-xs font-semibold text-gray-500 mb-1 uppercase">
                                        Tenggat Waktu (Deadline) *
                                    </label>
                                    {{-- ADDED 'border' CLASS HERE --}}
                                    <input
                                        type="date"
                                        name="deadline"
                                        id="deadline"
                                        required
                                        value="{{ old('deadline', optional($projek->deadline)->format('Y-m-d')) }}"
                                        class="block w-full border border-gray-300 rounded-xl shadow-sm
                                            focus:border-blue-500 focus:ring-blue-500
                                            py-3 px-4 transition text-gray-600"
                                    >

                                    @error('deadline')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>
                            </div>

                            <hr class="border-gray-100">

                            {{-- 3. HARGA PROJEK --}}
                            <div>
                                <label for="harga" class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="bg-blue-100 text-blue-700 w-6 h-6 rounded-full flex items-center justify-center text-xs">3</span>
                                    Nilai Projek *
                                </label>
                                <div class="relative rounded-xl shadow-sm max-w-md">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                        <span class="text-gray-500 font-bold">Rp</span>
                                    </div>
                                    
                                    {{-- Input Display (Format Rupiah) --}}
                                    {{-- ADDED 'border' CLASS HERE --}}
                                    <input type="text" id="harga_display"
                                           value="{{ number_format(old('harga', $projek->harga), 0, ',', '.') }}"
                                           class="pl-12 block w-full border border-gray-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 font-bold text-gray-800 text-lg transition"
                                           placeholder="0" required>
                                    
                                    {{-- Input Hidden (Nilai Asli / Plain Number) --}}
                                    <input type="hidden" name="harga" id="harga" value="{{ old('harga', $projek->harga) }}">
                                </div>
                                @error('harga')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <hr class="border-gray-100">

                            {{-- 4. STATUS PROJEK --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-3 flex items-center gap-2">
                                    <span class="bg-blue-100 text-blue-700 w-6 h-6 rounded-full flex items-center justify-center text-xs">4</span>
                                    Status Saat Ini *
                                </label>
                                
                           <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                            {{-- Status: Pending --}}
                            <label class="cursor-pointer group">
                                <input type="radio" name="status" value="pending" class="peer sr-only" required
                                    {{ old('status', $projek->status) == 'pending' ? 'checked' : '' }}>
                                <div class="p-4 rounded-xl border-2 border-gray-200 hover:border-amber-300
                                            peer-checked:border-amber-500 peer-checked:bg-amber-50 transition-all text-center h-full flex flex-col justify-center">
                                    <div class="mx-auto w-8 h-8 bg-amber-100 text-amber-600 rounded-full flex items-center justify-center mb-2 peer-checked:bg-amber-500 peer-checked:text-white transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <span class="block font-bold text-sm text-gray-700 peer-checked:text-amber-700">Pending</span>
                                </div>
                            </label>

                            {{-- Status: On Progress --}}
                            <label class="cursor-pointer group">
                                <input type="radio" name="status" value="proses" class="peer sr-only" required
                                    {{ old('status', $projek->status) == 'proses' ? 'checked' : '' }}>
                                <div class="p-4 rounded-xl border-2 border-gray-200 hover:border-blue-300
                                            peer-checked:border-blue-500 peer-checked:bg-blue-50 transition-all text-center h-full flex flex-col justify-center">
                                    <div class="mx-auto w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mb-2 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <span class="block font-bold text-sm text-gray-700 peer-checked:text-blue-700">On Progress</span>
                                </div>
                            </label>

                            {{-- Status: Selesai --}}
                            <label class="cursor-pointer group">
                                <input type="radio" name="status" value="selesai" class="peer sr-only" required
                                    {{ old('status', $projek->status) == 'selesai' ? 'checked' : '' }}>
                                <div class="p-4 rounded-xl border-2 border-gray-200 hover:border-emerald-300
                                            peer-checked:border-emerald-500 peer-checked:bg-emerald-50 transition-all text-center h-full flex flex-col justify-center">
                                    <div class="mx-auto w-8 h-8 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mb-2 peer-checked:bg-emerald-500 peer-checked:text-white transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span class="block font-bold text-sm text-gray-700 peer-checked:text-emerald-700">Selesai</span>
                                </div>
                            </label>

                            {{-- Status: Batal (BARU) --}}
                            <label class="cursor-pointer group">
                                <input type="radio" name="status" value="batal" class="peer sr-only" required
                                    {{ old('status', $projek->status) == 'batal' ? 'checked' : '' }}>
                                <div class="p-4 rounded-xl border-2 border-gray-200 hover:border-red-300
                                            peer-checked:border-red-500 peer-checked:bg-red-50 transition-all text-center h-full flex flex-col justify-center">
                                    <div class="mx-auto w-8 h-8 bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-2 peer-checked:bg-red-500 peer-checked:text-white transition">
                                        {{-- Icon X (Cross) --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                    <span class="block font-bold text-sm text-gray-700 peer-checked:text-red-700">Batal</span>
                                </div>
                            </label>
                        </div>
                        @error('status') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror

                            {{-- TOMBOL AKSI --}}
                            <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                                <a href="{{ route('projek.index') }}"
                                   class="px-5 py-2.5 bg-gray-200 text-gray-700 font-semibold rounded-xl hover:bg-gray-300 transition duration-300">
                                    Batal
                                </a>
                                <button type="submit"
                                        class="px-6 py-2.5 bg-blue-600 text-white font-bold rounded-xl shadow-lg hover:bg-blue-700 hover:shadow-blue-200 transition-all duration-300 transform hover:-translate-y-0.5 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                    </svg>
                                    Update Projek
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Script Format Rupiah (Sama dengan Create) --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const displayInput = document.getElementById("harga_display");
            const realInput = document.getElementById("harga");

            function formatRupiah(angka) {
                return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            displayInput.addEventListener("input", function () {
                let value = this.value.replace(/\D/g, ""); // Hapus semua karakter selain angka

                if (value === "") {
                    realInput.value = "";
                    this.value = "";
                    return;
                }

                // Masukkan angka asli ke input hidden
                realInput.value = value;

                // Tampilkan dalam format ribuan
                this.value = formatRupiah(value);
            });
        });
    </script>
</x-app-layout>
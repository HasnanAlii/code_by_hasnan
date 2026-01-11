<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Code By Hasnan - Jasa Pembuatan Website</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <meta name="theme-color" content="#2563eb">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    {{-- SweetAlert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900" x-data="{ showSidebar: false }">

<div class="min-h-screen bg-gray-100">

    {{-- NAVBAR MOBILE --}}
    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-100 shadow-sm sticky top-0 z-50 md:hidden">
        <div class="px-4 h-16 flex items-center justify-between">

            {{-- Sidebar Toggle --}}
            <button @click="showSidebar = true"
                class="p-3 bg-white border rounded-xl hover:bg-gray-100 transition">
                <i data-feather="menu" class="w-6 h-6 text-gray-700"></i>
            </button>

            <h1 class="text-base font-bold text-gray-800">Dashboard</h1>

            {{-- Notification (optional) --}}
            <div class="relative">
                @if (Route::is('dashboard'))
                <button class="p-2 rounded-full hover:bg-gray-100">
                    <i data-feather="bell" class="w-6 h-6 text-gray-700"></i>
                </button>
                @endif
            </div>

        </div>
    </nav>

    {{-- SIDEBAR --}}
    <div class="md:block" :class="showSidebar ? 'block' : 'hidden'">
        @include('layouts.navigation')
    </div>

    {{-- OVERLAY MOBILE --}}
    <div x-show="showSidebar" @click="showSidebar=false"
         class="fixed inset-0 bg-black/40 md:hidden"></div>

    {{-- HEADER DESKTOP --}}
    @isset($header)
        <header class="bg-white shadow md:ml-64 hidden md:block">
            <div class="max-w-7xl mx-auto py-6 px-4">
                {{ $header }}
            </div>
        </header>
    @endisset

    {{-- MAIN --}}
    <main>
        <div class="md:ml-64">
            {{ $slot }}
        </div>
    </main>
</div>

    {{-- CLEANUP MODAL --}}
    <div id="cleanupModal"
        class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6">

            <div class="flex items-center justify-center w-14 h-14 rounded-full bg-rose-100 text-rose-600 mx-auto mb-4">
                <i data-feather="x" class="w-7 h-7"></i>
            </div>

            <h3 class="text-lg font-bold text-slate-800 text-center">
                Konfirmasi Penghapusan
            </h3>
            <p class="text-sm text-slate-500 text-center mt-2">
                Semua data <b>lebih dari 5 bulan</b> akan dihapus permanen.<br>
                <span class="text-rose-600 font-semibold">Aksi ini tidak bisa dibatalkan.</span>
            </p>

            <div class="flex justify-center gap-3 mt-6">
                <button onclick="closeCleanupModal()"
                    class="px-4 py-2 text-sm font-bold rounded-xl bg-slate-100 text-slate-600 hover:bg-slate-200">
                    Batal
                </button>

                <form action="{{ route('dashboard.cleanup') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-5 py-2 text-sm font-bold rounded-xl bg-rose-600 text-white hover:bg-rose-700 shadow">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        function openCleanupModal() {
            document.getElementById('cleanupModal').classList.remove('hidden');
        }
        function closeCleanupModal() {
            document.getElementById('cleanupModal').classList.add('hidden');
        }

        document.addEventListener("DOMContentLoaded", () => {
            feather.replace();
        });
    </script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true
        });

        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    Toast.fire({ icon: 'info', title: "{{ Session::get('message') }}" }); break;
                case 'success':
                    Toast.fire({ icon: 'success', title: "{{ Session::get('message') }}" }); break;
                case 'warning':
                    Toast.fire({ icon: 'warning', title: "{{ Session::get('message') }}" }); break;
                case 'error':
                    Toast.fire({ icon: 'error', title: "{{ Session::get('message') }}" }); break;
            }
        @endif

        @if ($errors->any())
            let errors = `<ul class="swal-error-list">`;
            @foreach ($errors->all() as $error)
                errors += `<li>{{ $error }}</li>`;
            @endforeach
            errors += `</ul>`;
            Swal.fire({ icon: 'error', title: "Terjadi Kesalahan", html: errors });
        @endif
    </script>

</body>
</html>

<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-50">
        
        <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-xl rounded-2xl border border-blue-50 overflow-hidden relative">
            
            {{-- Hiasan Background Abstrak (Optional) --}}
            <div class="absolute top-0 right-0 -mr-10 -mt-10 w-40 h-40 rounded-full bg-blue-50/50 blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 -ml-10 -mb-10 w-40 h-40 rounded-full bg-amber-50/50 blur-3xl pointer-events-none"></div>

            {{-- HEADER --}}
            <div class="flex flex-col items-center mb-8 relative z-10">
                <div class="p-3 bg-blue-100 text-blue-600 rounded-2xl mb-4 shadow-sm">
                    {{-- Icon Lock --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-extrabold text-gray-800 tracking-tight">Selamat Datang Kembali</h2>
                <p class="text-sm text-gray-500 mt-1">Masuk untuk mengelola projek & keuangan</p>
            </div>

            {{-- FORM --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-6 relative z-10">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-bold text-gray-700 uppercase mb-2 ml-1">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                               class="pl-10 block w-full border-gray-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 transition placeholder-gray-300"
                               placeholder="Email Anda">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold text-gray-700 uppercase mb-2 ml-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                               class="pl-10 block w-full border-gray-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 transition placeholder-gray-300"
                               placeholder="••••••••">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Ingat Saya') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm font-semibold text-blue-600 hover:text-blue-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="{{ route('password.request') }}">
                            {{ __('Lupa Password?') }}
                        </a>
                    @endif
                </div>

                <div>
                    <button type="submit"
                            class="w-full flex justify-center items-center gap-2 px-4 py-3 bg-blue-600 border border-transparent rounded-xl font-bold text-white uppercase tracking-widest hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-200 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 transform hover:-translate-y-0.5">
                        {{ __('Masuk Sekarang') }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-xs text-gray-400">
                    &copy; {{ date('Y') }} Code By Hasnan. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
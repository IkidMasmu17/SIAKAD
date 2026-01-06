<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - {{ config('app.name', 'SIAKAD') }}</title>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
        .bg-pattern {
            background-color: #2d2463;
            background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.05) 1px, transparent 0);
            background-size: 40px 40px;
        }
    </style>
</head>

<body class="h-full bg-pattern flex items-center justify-center p-4">
    <div class="max-w-md w-full">
        <!-- Logo Section -->
        <div class="text-center mb-8 animate-fade-in-down">
            <img src="{{ asset('img/logo-putih.png') }}" alt="Logo" class="h-20 mx-auto mb-4 drop-shadow-xl">
            <h2 class="text-white text-3xl font-bold tracking-tight">SIAKAD Sekolah</h2>
            <p class="text-indigo-200 mt-2">Sistem Informasi Akademik Terintegrasi</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden animate-fade-in">
            <div class="p-8 sm:p-10">
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 border-l-4 border-siakad-purple pl-4">Login</h3>
                    <p class="text-gray-500 mt-2 ml-5 text-sm uppercase tracking-wider font-semibold">Selamat Datang!</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2 ml-1">Username</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-siakad-purple transition-colors">
                                <i class="fa-solid fa-user text-sm"></i>
                            </div>
                            <input type="text" name="username" id="username" required 
                                class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none" 
                                placeholder="Masukkan username Anda" value="{{ old('username') }}">
                        </div>
                        @error('username')
                            <p class="mt-1.5 text-xs text-red-600 font-medium ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Kata Sandi</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs font-bold text-siakad-purple hover:text-indigo-800 transition-colors">Lupa Sandi?</a>
                            @endif
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-siakad-purple transition-colors">
                                <i class="fa-solid fa-lock text-sm"></i>
                            </div>
                            <input type="password" name="password" id="password" required 
                                class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none" 
                                placeholder="••••••••">
                        </div>
                        @error('password')
                            <p class="mt-1.5 text-xs text-red-600 font-medium ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center ml-1">
                        <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}
                            class="h-4 w-4 text-siakad-purple focus:ring-siakad-purple border-gray-300 rounded transition-all cursor-pointer">
                        <label for="remember" class="ml-2 block text-sm text-gray-600 cursor-pointer">Ingat saya untuk sesi berikutnya</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                        class="w-full py-4 px-6 bg-siakad-purple hover:bg-indigo-800 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 hover:shadow-indigo-300 transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                        Masuk Ke Akun
                        <i class="fa-solid fa-arrow-right-to-bracket ml-2"></i>
                    </button>
                    
                    @if(session('error'))
                        <div class="p-3 rounded-xl bg-red-50 border border-red-100 flex items-center text-red-700 text-xs font-medium">
                            <i class="fa-solid fa-circle-exclamation mr-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif
                </form>
            </div>

            <!-- Footer Section -->
            <div class="bg-gray-50 p-6 text-center border-t border-gray-100">
                <p class="text-sm text-gray-600">
                    &copy; {{ date('Y') }} SIAKAD Sekolah. Seluruh hak cipta dilindungi.
                </p>
            </div>
        </div>
        
        <!-- Quick Help -->
        <div class="text-center mt-8 space-x-6">
            <a href="#" class="text-xs font-bold text-indigo-200 hover:text-white transition-colors underline decoration-indigo-500 underline-offset-4">Butuh Bantuan?</a>
            <a href="#" class="text-xs font-bold text-indigo-200 hover:text-white transition-colors underline decoration-indigo-500 underline-offset-4">Panduan Pengguna</a>
        </div>
    </div>
</body>
</html>

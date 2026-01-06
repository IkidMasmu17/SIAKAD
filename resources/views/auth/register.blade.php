<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Daftar Akun - {{ config('app.name', 'SIAKAD') }}</title>

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
            background-image: radial-gradient(circle at 2px 2px, rgba(255, 255, 255, 0.05) 1px, transparent 0);
            background-size: 40px 40px;
        }
    </style>
</head>

<body class="h-full bg-pattern flex items-center justify-center p-4">
    <div class="max-w-xl w-full">
        <!-- Logo Section -->
        <div class="text-center mb-8 animate-fade-in-down">
            <img src="{{ asset('img/logo-putih.png') }}" alt="Logo" class="h-16 mx-auto mb-4 drop-shadow-xl">
            <h2 class="text-white text-2xl font-bold tracking-tight">SIAKAD Sekolah</h2>
            <p class="text-indigo-200 mt-1 text-sm">Pendaftaran Akun Baru</p>
        </div>

        <!-- Register Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden animate-fade-in">
            <div class="p-8 sm:p-10">
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 border-l-4 border-siakad-purple pl-4">Registrasi</h3>
                    <p class="text-gray-500 mt-2 ml-5 text-sm uppercase tracking-wider font-semibold">Buat Akun Anda</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf

                    <!-- Name -->
                    <div class="md:col-span-2">
                        <label for="name"
                            class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2 ml-1">Nama
                            Lengkap</label>
                        <div class="relative group">
                            <div
                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-siakad-purple transition-colors">
                                <i class="fa-solid fa-id-card text-sm"></i>
                            </div>
                            <input type="text" name="name" id="name" required
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                                placeholder="Nama lengkap Anda" value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <p class="mt-1.5 text-xs text-red-600 font-medium ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="md:col-span-2">
                        <label for="email"
                            class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2 ml-1">Email</label>
                        <div class="relative group">
                            <div
                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-siakad-purple transition-colors">
                                <i class="fa-solid fa-envelope text-sm"></i>
                            </div>
                            <input type="email" name="email" id="email" required
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                                placeholder="email@contoh.com" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <p class="mt-1.5 text-xs text-red-600 font-medium ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password"
                            class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2 ml-1">Kata
                            Sandi</label>
                        <div class="relative group">
                            <div
                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-siakad-purple transition-colors">
                                <i class="fa-solid fa-lock text-sm"></i>
                            </div>
                            <input type="password" name="password" id="password" required
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                                placeholder="••••••••">
                        </div>
                        @error('password')
                            <p class="mt-1.5 text-xs text-red-600 font-medium ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password-confirm"
                            class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2 ml-1">Konfirmasi
                            Sandi</label>
                        <div class="relative group">
                            <div
                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-siakad-purple transition-colors">
                                <i
                                    class="fa-solid fa-shield-check text-sm text-gray-400 group-focus-within:text-siakad-purple transition-colors"></i>
                                <i class="fa-solid fa-lock text-sm"></i>
                            </div>
                            <input type="password" name="password_confirmation" id="password-confirm" required
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="md:col-span-2 pt-4">
                        <button type="submit"
                            class="w-full py-4 px-6 bg-siakad-purple hover:bg-indigo-800 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 hover:shadow-indigo-300 transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                            Daftar Sekarang
                            <i class="fa-solid fa-user-plus ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Footer Section -->
            <div class="bg-gray-50 p-6 text-center border-t border-gray-100">
                <p class="text-sm text-gray-600">
                    Sudah punya akun?
                    <a href="{{ route('login') }}"
                        class="font-bold text-siakad-purple hover:text-indigo-800 transition-colors">Login di sini</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
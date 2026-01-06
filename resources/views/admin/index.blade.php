@extends('layouts.admin')

@section('title', 'Dashboard')
@section('title-2', 'Dashboard')
@section('title-3', 'Dashboard')
@section('describ')
    Ini adalah halaman dashboard awal untuk admin
@endsection
@section('icon-l', 'icon-home')
@section('icon-r', 'icon-home')
@section('link')
    {{ route('admin.index') }}
@endsection

@section('content')
    <div class="space-y-8">
        {{-- Main Stats Grid --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            {{-- Total Siswa Card --}}
            <div
                class="bg-white p-4 md:p-6 rounded-3xl shadow-sm border border-gray-50 flex flex-col-reverse md:flex-row md:items-center justify-between group hover:shadow-xl transition-all duration-300">
                <div class="mt-4 md:mt-0">
                    <p class="text-[10px] md:text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Total Siswa</p>
                    <div class="flex flex-wrap items-baseline gap-1 md:space-x-2">
                        <h3 class="text-2xl md:text-3xl font-extrabold text-siakad-purple tracking-tight">532</h3>
                        <span
                            class="text-[10px] md:text-xs font-bold text-green-500 bg-green-50 px-2 py-0.5 rounded-full">+1.6%</span>
                    </div>
                </div>
                <div
                    class="w-10 h-10 md:w-14 md:h-14 bg-siakad-bg rounded-2xl flex items-center justify-center group-hover:bg-siakad-purple group-hover:text-white transition-colors self-start md:self-auto">
                    <i class="fas fa-user-graduate text-base md:text-xl"></i>
                </div>
            </div>

            {{-- Total Guru Card --}}
            <div
                class="bg-white p-4 md:p-6 rounded-3xl shadow-sm border border-gray-50 flex flex-col-reverse md:flex-row md:items-center justify-between group hover:shadow-xl transition-all duration-300">
                <div class="mt-4 md:mt-0">
                    <p class="text-[10px] md:text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Total Guru</p>
                    <div class="flex flex-wrap items-baseline gap-1 md:space-x-2">
                        <h3 class="text-2xl md:text-3xl font-extrabold text-siakad-purple tracking-tight">456</h3>
                        <span
                            class="text-[10px] md:text-xs font-bold text-red-500 bg-red-50 px-2 py-0.5 rounded-full">-0.5%</span>
                    </div>
                </div>
                <div
                    class="w-10 h-10 md:w-14 md:h-14 bg-siakad-bg rounded-2xl flex items-center justify-center group-hover:bg-siakad-purple group-hover:text-white transition-colors self-start md:self-auto">
                    <i class="fas fa-chalkboard-teacher text-base md:text-xl"></i>
                </div>
            </div>

            {{-- Sekolah Card --}}
            <div
                class="bg-white p-4 md:p-6 rounded-3xl shadow-sm border border-gray-50 flex flex-col-reverse md:flex-row md:items-center justify-between group hover:shadow-xl transition-all duration-300">
                <div class="mt-4 md:mt-0">
                    <p class="text-[10px] md:text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Sekolah</p>
                    <div class="flex flex-wrap items-baseline gap-1 md:space-x-2">
                        <h3 class="text-2xl md:text-3xl font-extrabold text-siakad-purple tracking-tight">89%</h3>
                        <span
                            class="text-[10px] md:text-xs font-bold text-green-500 bg-green-50 px-2 py-0.5 rounded-full">+0.9%</span>
                    </div>
                </div>
                <div
                    class="w-10 h-10 md:w-14 md:h-14 bg-siakad-bg rounded-2xl flex items-center justify-center group-hover:bg-siakad-purple group-hover:text-white transition-colors self-start md:self-auto">
                    <i class="fas fa-school text-base md:text-xl"></i>
                </div>
            </div>

            {{-- Kota Card --}}
            <div
                class="bg-white p-4 md:p-6 rounded-3xl shadow-sm border border-gray-50 flex flex-col-reverse md:flex-row md:items-center justify-between group hover:shadow-xl transition-all duration-300">
                <div class="mt-4 md:mt-0">
                    <p class="text-[10px] md:text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Kota/Kab</p>
                    <div class="flex flex-wrap items-baseline gap-1 md:space-x-2">
                        <h3 class="text-2xl md:text-3xl font-extrabold text-siakad-purple tracking-tight">365</h3>
                        <span
                            class="text-[10px] md:text-xs font-bold text-green-500 bg-green-50 px-2 py-0.5 rounded-full">+0.3%</span>
                    </div>
                </div>
                <div
                    class="w-10 h-10 md:w-14 md:h-14 bg-siakad-bg rounded-2xl flex items-center justify-center group-hover:bg-siakad-purple group-hover:text-white transition-colors self-start md:self-auto">
                    <i class="fas fa-map-marker-alt text-base md:text-xl"></i>
                </div>
            </div>
        </div>

        {{-- Chart and Secondary Stats --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            <div class="hidden md:block xl:col-span-2 bg-white p-5 md:p-8 rounded-3xl shadow-sm border border-gray-50">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-xl font-bold text-siakad-purple leading-tight">Grafik Analitik</h3>
                        <p class="text-sm text-gray-400 font-medium">Data performa sekolah periode {{ date('Y') }}</p>
                    </div>
                    <div class="flex space-x-2">
                        <button
                            class="px-4 py-2 text-xs font-bold text-siakad-purple bg-siakad-bg rounded-xl hover:bg-siakad-purple hover:text-white transition-all">Mingguan</button>
                        <button
                            class="px-4 py-2 text-xs font-bold text-white bg-siakad-purple rounded-xl shadow-lg shadow-siakad-purple/20">Bulanan</button>
                    </div>
                </div>
                <div id="sales-analytics" class="w-full h-[400px]"></div>
            </div>

            <div class="space-y-6">
                {{-- E-Book Card --}}
                <div
                    class="bg-gradient-to-br from-siakad-purple to-siakad-light-purple p-8 rounded-3xl shadow-xl shadow-siakad-purple/30 text-white relative overflow-hidden group">
                    <div class="relative z-10">
                        <p class="text-xs font-bold opacity-60 uppercase tracking-widest mb-2">Total E-Book</p>
                        <h3 class="text-4xl font-extrabold mb-4">{{ rand(10, 100) }}</h3>
                        <div class="flex items-center text-xs font-bold text-white/80">
                            <i class="fas fa-clock mr-2"></i> Diupdate 1 jam yang lalu
                        </div>
                    </div>
                    <i
                        class="fas fa-book-open absolute -right-4 -bottom-4 text-8xl text-white/10 group-hover:scale-110 transition-transform"></i>
                </div>

                {{-- Audio Book Card --}}
                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-gray-50 flex items-center space-x-6 hover:shadow-md transition-all">
                    <div
                        class="w-16 h-16 bg-green-50 text-green-500 rounded-2xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-file-audio text-2xl"></i>
                    </div>
                    <div>
                        <h4 class="text-2xl font-extrabold text-siakad-purple">128</h4>
                        <p class="text-sm font-bold text-gray-400">Audio Books</p>
                    </div>
                </div>

                {{-- Video Book Card --}}
                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-gray-50 flex items-center space-x-6 hover:shadow-md transition-all">
                    <div
                        class="w-16 h-16 bg-yellow-50 text-yellow-500 rounded-2xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-file-video text-2xl"></i>
                    </div>
                    <div>
                        <h4 class="text-2xl font-extrabold text-siakad-purple">64</h4>
                        <p class="text-sm font-bold text-gray-400">Video Lessons</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Schools Table --}}
        <div class="hidden md:block bg-white rounded-3xl shadow-sm border border-gray-50 overflow-hidden">
            <div
                class="p-5 md:p-8 border-b border-gray-50 flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                <div>
                    <h3 class="text-xl font-bold text-siakad-purple leading-tight">Daftar Sekolah Terdaftar</h3>
                    <p class="text-sm text-gray-400 font-medium">Kelola dan lihat ringkasan data sekolah</p>
                </div>
                <div class="flex space-x-3">
                    <div class="relative">
                        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input type="text" placeholder="Cari sekolah..."
                            class="pl-10 pr-4 py-2 bg-siakad-bg border-none rounded-xl text-sm focus:ring-2 focus:ring-siakad-purple/20 transition-all">
                    </div>
                    <button
                        class="bg-siakad-purple text-white px-6 py-2 rounded-xl text-sm font-bold shadow-lg shadow-siakad-purple/20 hover:scale-105 transition-transform active:scale-95">
                        Tambah Sekolah
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-siakad-bg/50">
                        <tr>
                            <th class="px-8 py-4 text-xs font-bold text-siakad-purple uppercase tracking-widest">Nama
                                Sekolah</th>
                            <th class="px-8 py-4 text-xs font-bold text-siakad-purple uppercase tracking-widest">Kota/Kab
                            </th>
                            <th class="px-8 py-4 text-xs font-bold text-siakad-purple uppercase tracking-widest">Jumlah
                                Siswa</th>
                            <th
                                class="px-8 py-4 text-xs font-bold text-siakad-purple uppercase tracking-widest text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @php
                            $sekolahs = [
                                ['SMA N 1 Medan', 'Medan', rand(10, 1000)],
                                ['SMA N 1 Brandan Barat', 'Langkat', rand(10, 1000)],
                                ['SMA N 1 Babalan', 'Langkat', rand(10, 1000)],
                                ['SMA N 1 Besitang', 'Langkat', rand(10, 1000)],
                                ['SMK YPT Maju', 'Besitang', rand(10, 1000)],
                            ];
                        @endphp
                        @foreach($sekolahs as $sekolah)
                            <tr class="hover:bg-siakad-bg/30 transition-colors group">
                                <td class="px-8 py-5">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-10 h-10 bg-siakad-bg rounded-xl flex items-center justify-center text-siakad-purple font-bold group-hover:bg-siakad-purple group-hover:text-white transition-all">
                                            {{ substr($sekolah[0], 0, 1) }}
                                        </div>
                                        <span class="font-bold text-siakad-purple">{{ $sekolah[0] }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-5">
                                    <span class="text-sm text-gray-500 font-medium">{{ $sekolah[1] }}</span>
                                </td>
                                <td class="px-8 py-5">
                                    <span
                                        class="text-sm font-bold text-siakad-purple bg-siakad-bg px-3 py-1 rounded-full">{{ $sekolah[2] }}
                                        Siswa</span>
                                </td>
                                <td class="px-8 py-5">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button
                                            class="p-2 text-gray-400 hover:text-siakad-purple hover:bg-siakad-bg rounded-lg transition-all"
                                            title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="p-2 text-gray-400 hover:text-green-500 hover:bg-green-50 rounded-lg transition-all"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button
                                            class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all"
                                            title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script type="text/javascript" src="{{ asset('assets/pages/dashboard/custom-dashboard.min.js') }}"></script>
@endpush
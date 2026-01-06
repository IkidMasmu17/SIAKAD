<nav class="w-64 bg-siakad-purple min-h-screen flex flex-col text-white shadow-xl transition-all duration-300">
    <div class="p-6 flex flex-col items-center border-b border-siakad-light-purple/30">
        @if ($mySekolah)
            @if ($mySekolah->logo)
                <a href="/admin" class="mb-4">
                    <img class="w-32 h-auto object-contain" src="{{ Storage::url($mySekolah->logo) }}" alt="logo sekolah" />
                </a>
            @endif
            @if ($mySekolah->name)
                <h1 class="text-lg font-bold text-center leading-tight uppercase tracking-wider">{{ $mySekolah->name }}</h1>
            @endif
        @else
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-siakad-purple text-xl"></i>
                </div>
                <span class="text-xl font-bold tracking-tight">SIAKAD</span>
            </div>
        @endif
    </div>

    <div class="flex-1 overflow-y-auto py-6 custom-scrollbar">
        <div class="px-6 mb-4 text-xs font-semibold text-siakad-light-purple uppercase tracking-widest opacity-60">Main
            Menu</div>
        <ul class="space-y-1">
            {{-- Dashboard --}}
            <li>
                <a href="{{ route('admin.index') }}"
                    class="flex items-center px-6 py-3 space-x-4 {{ request()->is('admin') ? 'bg-siakad-light-purple text-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                    <i class="fa fa-home text-lg group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>

            {{-- Peserta Didik --}}
            <li x-data="{ open: {{ (request()->is('admin/peserta-didik/*')) ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between px-6 py-3 space-x-4 {{ request()->is('admin/peserta-didik/*') ? 'bg-siakad-light-purple/10 text-white border-l-4 border-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                    <div class="flex items-center space-x-4">
                        <i class="fa fa-graduation-cap text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Peserta Didik</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': open }"></i>
                </button>
                <ul x-show="open" x-cloak class="bg-siakad-purple/50 py-2 border-l border-siakad-light-purple/30 ml-8">
                    <li><a href="{{ route('admin.pesertadidik.siswa.index') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/peserta-didik/siswa') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Siswa</a>
                    </li>
                    <li><a href="{{ route('admin.pesertadidik.alumni') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/peserta-didik/alumni') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Alumni</a>
                    </li>
                    <li><a href="{{ route('admin.pesertadidik.pindah-kelas') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/peserta-didik/pindah-kelas') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Pindah
                            Kelas</a></li>
                    <li><a href="{{ route('admin.pesertadidik.tidak-naik-kelas') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/peserta-didik/tidak-naik-kelas') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Tidak
                            Naik Kelas</a></li>
                    <li><a href="{{ route('admin.pesertadidik.siswa-pindahan') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/peserta-didik/siswa-pindahan') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Siswa
                            Pindahan</a></li>
                    <li><a href="{{ route('admin.pesertadidik.pengaturan-siswa-per-kelas') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/peserta-didik/pengaturan-siswa-per-kelas') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Pengaturan
                            Siswa Per Kelas</a></li>
                </ul>
            </li>

            {{-- Pelanggaran --}}
            <li x-data="{ open: {{ (request()->is('admin/pelanggaran/*')) ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between px-6 py-3 space-x-4 {{ request()->is('admin/pelanggaran/*') ? 'bg-siakad-light-purple/10 text-white border-l-4 border-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                    <div class="flex items-center space-x-4">
                        <i class="fa fa-exclamation-triangle text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Pelanggaran</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': open }"></i>
                </button>
                <ul x-show="open" x-cloak class="bg-siakad-purple/50 py-2 border-l border-siakad-light-purple/30 ml-8">
                    <li><a href="{{ route('admin.pelanggaran.siswa') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/pelanggaran/siswa') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Siswa</a>
                    </li>
                    <li><a href="{{ route('admin.pelanggaran.sanksi') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/pelanggaran/sanksi') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Sanksi</a>
                    </li>
                    <li><a href="{{ route('admin.pelanggaran.kategori-pelanggaran') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/pelanggaran/kategori-pelanggaran') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Kategori
                            Pelanggaran</a></li>
                </ul>
            </li>

            {{-- E-Voting --}}
            <li x-data="{ open: {{ (request()->is('admin/e-voting/*')) ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between px-6 py-3 space-x-4 {{ request()->is('admin/e-voting/*') ? 'bg-siakad-light-purple/10 text-white border-l-4 border-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-vote-yea text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">E-Voting</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': open }"></i>
                </button>
                <ul x-show="open" x-cloak class="bg-siakad-purple/50 py-2 border-l border-siakad-light-purple/30 ml-8">
                    <li><a href="{{ route('admin.e-voting.calon') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/e-voting/calon') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Calon</a>
                    </li>
                    <li><a href="{{ route('admin.e-voting.posisi') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/e-voting/posisi') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Posisi</a>
                    </li>
                    <li><a href="{{ route('admin.e-voting.pemilihan') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/e-voting/pemilihan') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Pemilihan</a>
                    </li>
                </ul>
            </li>

            {{-- Fungsionaris --}}
            <li x-data="{ open: {{ (request()->is('admin/fungsionaris/*')) ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between px-6 py-3 space-x-4 {{ request()->is('admin/fungsionaris/*') ? 'bg-siakad-light-purple/10 text-white border-l-4 border-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                    <div class="flex items-center space-x-4">
                        <i class="fa fa-user-tie text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Fungsionaris</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': open }"></i>
                </button>
                <ul x-show="open" x-cloak class="bg-siakad-purple/50 py-2 border-l border-siakad-light-purple/30 ml-8">
                    <li><a href="{{ route('admin.fungsionaris.pegawai.index') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/fungsionaris/pegawai') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Pegawai</a>
                    </li>
                    <li><a href="{{ route('admin.fungsionaris.guru') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/fungsionaris/guru') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Guru</a>
                    </li>
                </ul>
            </li>

            {{-- Pelajaran --}}
            <li x-data="{ open: {{ (request()->is('admin/pelajaran/*')) ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between px-6 py-3 space-x-4 {{ request()->is('admin/pelajaran/*') ? 'bg-siakad-light-purple/10 text-white border-l-4 border-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                    <div class="flex items-center space-x-4">
                        <i class="fa fa-book text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Pelajaran</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': open }"></i>
                </button>
                <ul x-show="open" x-cloak class="bg-siakad-purple/50 py-2 border-l border-siakad-light-purple/30 ml-8">
                    <li><a href="{{ route('admin.pelajaran.mata-pelajaran') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/pelajaran/mata-pelajaran') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Mata
                            Pelajaran</a></li>
                    <li><a href="{{ route('admin.pelajaran.jadwal-pelajaran') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/pelajaran/jadwal-pelajaran') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Jadwal
                            Pelajaran</a></li>
                </ul>
            </li>

            {{-- Absensi --}}
            <li x-data="{ open: {{ (request()->is('admin/absensi/*')) ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between px-6 py-3 space-x-4 {{ request()->is('admin/absensi/*') ? 'bg-siakad-light-purple/10 text-white border-l-4 border-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                    <div class="flex items-center space-x-4">
                        <i class="fa fa-clipboard-list text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Absensi</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': open }"></i>
                </button>
                <ul x-show="open" x-cloak class="bg-siakad-purple/50 py-2 border-l border-siakad-light-purple/30 ml-8">
                    <li><a href="{{ route('admin.absensi.siswa') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/absensi/siswa') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Siswa</a>
                    </li>
                    <li><a href="{{ route('admin.absensi.rekap-siswa') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/absensi/rekap-siswa') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Rekap
                            Siswa</a></li>
                </ul>
            </li>

            {{-- Daftar Nilai --}}
            <li>
                <a href="{{ route('admin.daftar-nilai') }}"
                    class="flex items-center px-6 py-3 space-x-4 {{ request()->is('admin/daftar-nilai') ? 'bg-siakad-light-purple text-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                    <i class="fa fa-medal text-lg group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Daftar Nilai</span>
                </a>
            </li>

            {{-- Referensi --}}
            <li x-data="{ open: {{ (request()->is('admin/referensi/*')) ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between px-6 py-3 space-x-4 {{ request()->is('admin/referensi/*') ? 'bg-siakad-light-purple/10 text-white border-l-4 border-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                    <div class="flex items-center space-x-4">
                        <i class="fa fa-list-alt text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Referensi</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': open }"></i>
                </button>
                <ul x-show="open" x-cloak class="bg-siakad-purple/50 py-2 border-l border-siakad-light-purple/30 ml-8">
                    <li><a href="{{ route('admin.referensi.bagian-pegawai') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/referensi/bagian-pegawai') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Bagian
                            Pegawai</a></li>
                    <li><a href="{{ route('admin.referensi.semester') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/referensi/semester') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Semester</a>
                    </li>
                    <li><a href="{{ route('admin.referensi.status-guru') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/referensi/status-guru') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Status
                            Guru</a></li>
                    <li><a href="{{ route('admin.referensi.jenjang-pegawai') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/referensi/jenjang-pegawai') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Jenjang
                            Pegawai</a></li>
                    <li><a href="{{ route('admin.referensi.tingkatan-kelas') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/referensi/tingkatan-kelas') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Tingkatan
                            Kelas</a></li>
                    <li><a href="{{ route('admin.referensi.pengaturan-hak-akses') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/referensi/pengaturan-hak-akses') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Pengaturan
                            Hak Akses</a></li>
                </ul>
            </li>

            {{-- Sekolah --}}
            <li x-data="{ open: {{ (request()->is('admin/sekolah/*')) ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between px-6 py-3 space-x-4 {{ request()->is('admin/sekolah/*') ? 'bg-siakad-light-purple/10 text-white border-l-4 border-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                    <div class="flex items-center space-x-4">
                        <i class="fa fa-school text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Sekolah</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': open }"></i>
                </button>
                <ul x-show="open" x-cloak class="bg-siakad-purple/50 py-2 border-l border-siakad-light-purple/30 ml-8">
                    <li><a href="#"
                            class="block px-6 py-2 text-sm text-siakad-light-purple/70 hover:text-white">Kelas</a></li>
                    <li><a href="#"
                            class="block px-6 py-2 text-sm text-siakad-light-purple/70 hover:text-white">Jurusan</a>
                    </li>
                    <li><a href="{{ route('admin.sekolah.jam') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/sekolah/jam') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Jam
                            Pelajaran</a></li>
                </ul>
            </li>

            {{-- Kalender --}}
            <li x-data="{ open: {{ (request()->is('admin/kalender/*')) ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between px-6 py-3 space-x-4 {{ request()->is('admin/kalender/*') ? 'bg-siakad-light-purple/10 text-white border-l-4 border-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                    <div class="flex items-center space-x-4">
                        <i class="fa fa-calendar text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Kalender</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': open }"></i>
                </button>
                <ul x-show="open" x-cloak class="bg-siakad-purple/50 py-2 border-l border-siakad-light-purple/30 ml-8">
                    <li><a href="{{ route('admin.kalender.kalender-akademik') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/kalender/kalender-akademik') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Kalender
                            Akademik</a></li>
                </ul>
            </li>

            {{-- Pengumuman --}}
            <li x-data="{ open: {{ (request()->is('admin/pengumuman/*')) ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between px-6 py-3 space-x-4 {{ request()->is('admin/pengumuman/*') ? 'bg-siakad-light-purple/10 text-white border-l-4 border-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                    <div class="flex items-center space-x-4">
                        <i class="fa fa-bell text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Pengumuman</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': open }"></i>
                </button>
                <ul x-show="open" x-cloak class="bg-siakad-purple/50 py-2 border-l border-siakad-light-purple/30 ml-8">
                    <li><a href="{{ route('admin.pengumuman.pesan') }}"
                            class="block px-6 py-2 text-sm {{ request()->is('admin/pengumuman/pesan') ? 'text-white font-bold' : 'text-siakad-light-purple/70 hover:text-white' }}">Pesan</a>
                    </li>
                </ul>
            </li>

            {{-- Perpustakaan --}}
            <li x-data="{ open: false }">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between px-6 py-3 space-x-4 text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white transition-all duration-200 group">
                    <div class="flex items-center space-x-4">
                        <i class="fa fa-book text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Perpustakaan</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': open }"></i>
                </button>
                <ul x-show="open" x-cloak class="bg-siakad-purple/50 py-2 border-l border-siakad-light-purple/30 ml-8">
                    <li><a href="#!"
                            class="block px-6 py-2 text-sm text-siakad-light-purple/70 hover:text-white">E-Book</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="p-6">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="flex items-center px-4 py-3 bg-red-500/10 text-red-400 rounded-xl hover:bg-red-500 hover:text-white transition-all duration-300 group">
            <i class="fas fa-sign-out-alt mr-3 group-hover:translate-x-1 transition-transform"></i>
            <span class="font-bold">Log out</span>
        </a>
    </div>
</nav>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(76, 63, 145, 0.4);
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: rgba(76, 63, 145, 0.6);
    }

    [x-cloak] {
        display: none !important;
    }
</style>
<div>
    {{-- Mobile Overlay --}}
    <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition.opacity
        class="fixed inset-0 bg-black/50 z-40 md:hidden"></div>

    <nav class="fixed inset-y-0 left-0 z-50 w-64 bg-siakad-purple min-h-screen flex flex-col text-white shadow-xl transition-transform duration-300 md:sticky md:top-0 md:h-screen md:overflow-y-auto transform"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
        <div class="p-6 flex flex-col items-center border-b border-siakad-light-purple/30">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                    <i class="fas fa-user-graduate text-siakad-purple text-xl"></i>
                </div>
                <span class="text-xl font-bold tracking-tight">Panel Siswa</span>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto py-6 custom-scrollbar">
            <div class="px-6 mb-4 text-xs font-semibold text-siakad-light-purple uppercase tracking-widest opacity-60">
                Main
                Menu</div>
            <ul class="space-y-1">
                {{-- Dashboard --}}
                <li>
                    <a href="{{ route('siswa.index') }}"
                        class="flex items-center px-6 py-3 space-x-4 {{ request()->is('siswa') ? 'bg-siakad-light-purple text-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                        <i class="fa fa-home text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </li>

                {{-- Pelanggaran --}}
                <li>
                    <a href="{{ route('siswa.pelanggaran.pelanggaran') }}"
                        class="flex items-center px-6 py-3 space-x-4 {{ request()->is('siswa/pelanggaran') ? 'bg-siakad-light-purple text-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                        <i class="fa fa-exclamation-triangle text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Pelanggaran</span>
                    </a>
                </li>

                {{-- E-Voting --}}
                <li>
                    <a href="{{ route('siswa.e-voting.e-voting') }}"
                        class="flex items-center px-6 py-3 space-x-4 {{ request()->is('siswa/e-voting') ? 'bg-siakad-light-purple text-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                        <i class="fa fa-vote-yea text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">E-Voting</span>
                    </a>
                </li>

                {{-- Jadwal Pelajaran --}}
                <li>
                    <a href="{{ route('siswa.pelajaran.jadwal-pelajaran') }}"
                        class="flex items-center px-6 py-3 space-x-4 {{ request()->is('siswa/pelajaran') ? 'bg-siakad-light-purple text-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                        <i class="fa fa-book-open text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Jadwal Pelajaran</span>
                    </a>
                </li>

                {{-- Kalender --}}
                <li>
                    <a href="{{ route('siswa.kalender.kalender-akademik') }}"
                        class="flex items-center px-6 py-3 space-x-4 {{ request()->is('siswa/kalender') ? 'bg-siakad-light-purple text-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                        <i class="fa fa-calendar text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Kalender</span>
                    </a>
                </li>

                {{-- Pengumuman --}}
                <li>
                    <a href="{{ route('siswa.pengumuman.pengumuman') }}"
                        class="flex items-center px-6 py-3 space-x-4 {{ request()->is('siswa/pengumuman') ? 'bg-siakad-light-purple text-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                        <i class="fa fa-bell text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Pengumuman</span>
                    </a>
                </li>

                {{-- Perpustakaan --}}
                <li>
                    <a href="{{ route('siswa.perpustakaan.perpustakaan') }}"
                        class="flex items-center px-6 py-3 space-x-4 {{ request()->is('siswa/perpustakaan') ? 'bg-siakad-light-purple text-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                        <i class="fa fa-book text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Perpustakaan</span>
                    </a>
                </li>

                {{-- CBT --}}
                <li>
                    <a href="{{ route('siswa.cbt.cbt-siswa') }}"
                        class="flex items-center px-6 py-3 space-x-4 {{ request()->is('siswa/cbt') ? 'bg-siakad-light-purple text-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                        <i class="fa fa-laptop-code text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">CBT</span>
                    </a>
                </li>

                {{-- E-Learning --}}
                <li>
                    <a href="{{ route('siswa.elearning.elearning-siswa') }}"
                        class="flex items-center px-6 py-3 space-x-4 {{ request()->is('siswa/elearning') ? 'bg-siakad-light-purple text-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                        <i class="fa fa-desktop text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">E-Learning</span>
                    </a>
                </li>

                {{-- Leaderboard --}}
                <li>
                    <a href="{{ route('siswa.leaderboard.leaderboard-siswa') }}"
                        class="flex items-center px-6 py-3 space-x-4 {{ request()->is('siswa/leaderboard') ? 'bg-siakad-light-purple text-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                        <i class="fa fa-crown text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Leaderboard</span>
                    </a>
                </li>

                {{-- Nilai --}}
                <li>
                    <a href="{{ route('siswa.nilai.nilai-siswa') }}"
                        class="flex items-center px-6 py-3 space-x-4 {{ request()->is('siswa/nilai') ? 'bg-siakad-light-purple text-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                        <i class="fa fa-medal text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Nilai</span>
                    </a>
                </li>

                {{-- Forum --}}
                <li>
                    <a href="{{ route('siswa.forum.forum-siswa') }}"
                        class="flex items-center px-6 py-3 space-x-4 {{ request()->is('siswa/forum') ? 'bg-siakad-light-purple text-white' : 'text-siakad-light-purple/80 hover:bg-siakad-light-purple/20 hover:text-white' }} transition-all duration-200 group">
                        <i class="fa fa-comments text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Forum</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="p-6">
            {{-- Check if Logout route exists, otherwise use standard --}}
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="flex items-center px-4 py-3 bg-red-500/10 text-red-400 rounded-xl hover:bg-red-500 hover:text-white transition-all duration-300 group">
                <i class="fas fa-sign-out-alt mr-3 group-hover:translate-x-1 transition-transform"></i>
                <span class="font-bold">Log out</span>
            </a>
        </div>
    </nav>
</div>

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
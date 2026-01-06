<header
    class="h-20 bg-white border-b border-gray-100 flex items-center justify-between px-8 sticky top-0 z-30 shadow-sm">
    <div class="flex items-center space-x-4">
        <button @click="sidebarOpen = !sidebarOpen"
            class="md:hidden text-siakad-purple p-2 hover:bg-siakad-bg rounded-lg transition-colors">
            <i class="fas fa-bars text-xl"></i>
        </button>
        <div>
            <h2 class="text-xl font-bold text-siakad-purple tracking-tight">Halo, {{ Auth::user()->name }}!</h2>
            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Selamat Datang di SIAKAD</p>
        </div>
    </div>

    <div class="flex items-center space-x-6">
        {{-- Search --}}
        <div
            class="hidden md:flex items-center bg-siakad-bg px-4 py-2 rounded-xl group transition-all duration-300 focus-within:ring-2 focus-within:ring-siakad-purple/20">
            <i class="feather icon-search text-gray-400 group-focus-within:text-siakad-purple transition-colors"></i>
            <input type="text" placeholder="Cari sesuatu..."
                class="bg-transparent border-none focus:ring-0 text-sm ml-2 w-48 text-siakad-purple placeholder-gray-400">
        </div>

        {{-- Notifications --}}
        <div class="relative">
            <button @click="openDropdown = openDropdown === 'notification' ? null : 'notification'"
                class="p-2 text-gray-400 hover:text-siakad-purple hover:bg-siakad-bg rounded-xl transition-all duration-300 relative">
                <i class="icon-bell text-xl"></i>
                <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
            </button>
            <div x-show="openDropdown === 'notification'" @click.away="openDropdown = null" x-cloak x-transition
                class="absolute right-0 mt-3 w-80 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden z-50">
                <div class="p-4 border-b border-gray-50 flex justify-between items-center bg-siakad-bg/30">
                    <span class="font-bold text-siakad-purple">Notifikasi</span>
                    <span class="text-xs font-bold text-white bg-red-500 px-2 py-0.5 rounded-full">5 Baru</span>
                </div>
                <div class="max-h-96 overflow-y-auto">
                    {{-- Sample Notif --}}
                    <a href="#"
                        class="flex items-start p-4 hover:bg-siakad-bg transition-colors border-b border-gray-50">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                            <i class="feather icon-info text-blue-600"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-semibold text-siakad-purple">Pengumuman Akademik</p>
                            <p class="text-xs text-gray-400 mt-1 line-clamp-2">Jadwal ujian akhir semester telah
                                diperbarui, silakan cek menu kalender.</p>
                            <span class="text-[10px] text-gray-300 mt-2 block font-medium">30 menit yang lalu</span>
                        </div>
                    </a>
                </div>
                <a href="#"
                    class="block p-4 text-center text-xs font-bold text-siakad-purple hover:bg-siakad-bg transition-colors">Lihat
                    Semua</a>
            </div>
        </div>

        {{-- Profile --}}
        <div class="flex items-center space-x-4 pl-6 border-l border-gray-100 relative">
            <div class="text-right hidden sm:block leading-tight">
                <p class="text-sm font-bold text-siakad-purple">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">
                    {{ Auth::user()->roles->first()->name ?? 'User' }}
                </p>
            </div>
            <button @click="openDropdown = openDropdown === 'profile' ? null : 'profile'"
                class="flex items-center space-x-2 p-1 hover:bg-siakad-bg rounded-xl transition-all duration-300">
                <div class="w-10 h-10 rounded-xl overflow-hidden border-2 border-white shadow-sm">
                    <img src="{{ asset('assets/images/avatar-4.jpg') }}" class="w-full h-full object-cover"
                        alt="User-Profile-Image">
                </div>
                <i class="feather icon-chevron-down text-gray-400 text-sm transition-transform duration-300"
                    :class="{ 'rotate-180': openDropdown === 'profile' }"></i>
            </button>

            <div x-show="openDropdown === 'profile'" @click.away="openDropdown = null" x-cloak x-transition
                class="absolute right-0 top-16 mt-2 w-48 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden z-50 transition-all duration-200">
                <div class="p-2">
                    <a href="#!"
                        class="flex items-center px-4 py-3 text-sm text-siakad-purple hover:bg-siakad-bg rounded-xl transition-colors">
                        <i class="fas fa-user mr-3 text-gray-400"></i> Profil Saya
                    </a>
                    <div class="h-px bg-gray-50 my-1"></div>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="flex items-center px-4 py-3 text-sm text-red-500 hover:bg-red-50 rounded-xl transition-colors">
                        <i class="feather icon-log-out mr-3"></i> Keluar
                    </a>
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</header>
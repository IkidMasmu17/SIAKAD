<header
    class="h-20 bg-white border-b border-gray-100 flex items-center justify-between px-8 sticky top-0 z-30 shadow-sm">
    <div class="flex items-center space-x-4">
        <button @click="sidebarOpen = !sidebarOpen"
            class="md:hidden text-siakad-purple p-2 hover:bg-siakad-bg rounded-lg transition-colors">
            <i class="fas fa-bars text-xl"></i>
        </button>
        <div class="hidden md:block">
            <h2 class="text-xl font-bold text-siakad-purple tracking-tight">Halo, {{ Auth::user()->name }}!</h2>
            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Selamat Datang</p>
        </div>
    </div>

    <div class="flex items-center space-x-6">
        {{-- Mobile Search Toggle --}}
        <button @click="mobileSearchOpen = !mobileSearchOpen"
            class="md:hidden p-2 text-gray-400 hover:text-siakad-purple hover:bg-siakad-bg rounded-xl transition-all">
            <i class="feather icon-search text-xl"></i>
        </button>

        {{-- Mobile Search Overlay --}}
        <div x-show="mobileSearchOpen" @click.away="mobileSearchOpen = false" x-cloak x-transition
            class="absolute top-0 left-0 w-full h-full bg-white z-50 flex items-center px-4 md:hidden border-b border-gray-100">
            <i class="feather icon-search text-gray-400 mr-3"></i>
            <input type="text" placeholder="Cari sesuatu..."
                class="w-full bg-transparent border-none focus:ring-0 text-siakad-purple text-base">
            <button @click="mobileSearchOpen = false" class="ml-3 text-gray-400 hover:text-red-500">
                <i class="fas fa-times"></i>
            </button>
        </div>

        {{-- Search --}}
        <div
            class="hidden md:flex items-center bg-siakad-bg px-4 py-2 rounded-xl group transition-all duration-300 focus-within:ring-2 focus-within:ring-siakad-purple/20">
            <i class="feather icon-search text-gray-400 group-focus-within:text-siakad-purple transition-colors"></i>
            <input type="text" placeholder="Cari sesuatu..."
                class="bg-transparent border-none focus:ring-0 text-sm ml-2 w-48 text-siakad-purple placeholder-gray-400">
        </div>

        {{-- Notifications (Mockup) --}}
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
                    <span class="text-xs font-bold text-white bg-red-500 px-2 py-0.5 rounded-full">New</span>
                </div>
                <div class="max-h-96 overflow-y-auto p-4 text-center text-gray-400 text-sm">
                    Belum ada notifikasi baru.
                </div>
            </div>
        </div>

        {{-- Profile --}}
        <div class="flex items-center space-x-4 pl-6 border-l border-gray-100 relative">
            <div class="text-right hidden sm:block leading-tight">
                <p class="text-sm font-bold text-siakad-purple">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">ORANG TUA</p>
            </div>
            <button @click="openDropdown = openDropdown === 'profile' ? null : 'profile'"
                class="flex items-center space-x-2 p-1 hover:bg-siakad-bg rounded-xl transition-all duration-300">
                <div class="w-10 h-10 rounded-xl overflow-hidden border-2 border-white shadow-sm">
                    <img src="{{ asset('assets/images/avatar-4.jpg') }}" class="w-full h-full object-cover"
                        alt="Profile">
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
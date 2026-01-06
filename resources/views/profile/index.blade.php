@extends($layout)

@section('title', 'Profil Saya')
@section('title-2', 'Profil Saya')
@section('title-3', 'Profil Saya')

@section('describ')
    Halaman profil pengguna
@endsection

@section('icon-l', 'icon-user')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('profile') }}
@endsection

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-3xl shadow-sm border border-gray-50 overflow-hidden">
        <div class="h-32 bg-siakad-purple/10 w-full relative">
            <div class="absolute inset-0 bg-pattern opacity-10"></div>
        </div>
        <div class="px-8 pb-8">
            <div class="relative flex flex-col items-center -mt-16 mb-6">
                <div class="w-32 h-32 rounded-3xl overflow-hidden border-4 border-white shadow-xl bg-white">
                    <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="Profile" class="w-full h-full object-cover">
                </div>
                <h3 class="mt-4 text-2xl font-bold text-siakad-purple text-center">{{ $user->name }}</h3>
                <div class="flex items-center space-x-2 mt-2">
                    <span class="px-3 py-1 text-xs font-bold text-white uppercase bg-siakad-purple rounded-full shadow-lg shadow-siakad-purple/20">
                        {{ $user->roles->first()->name ?? 'User' }}
                    </span>
                    <span class="px-3 py-1 text-xs font-bold text-green-600 uppercase bg-green-50 rounded-full border border-green-100">
                        Aktif
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                <div class="space-y-6">
                    <div class="flex items-center space-x-4 p-4 rounded-2xl bg-siakad-bg/50 hover:bg-siakad-bg transition-colors">
                        <div class="w-10 h-10 rounded-xl bg-white text-siakad-purple flex items-center justify-center shadow-sm">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-0.5">Username</p>
                            <p class="font-bold text-gray-700">{{ $user->username }}</p>
                        </div>
                    </div>
                    
                    @if($user->email)
                    <div class="flex items-center space-x-4 p-4 rounded-2xl bg-siakad-bg/50 hover:bg-siakad-bg transition-colors">
                        <div class="w-10 h-10 rounded-xl bg-white text-siakad-purple flex items-center justify-center shadow-sm">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-0.5">Email</p>
                            <p class="font-bold text-gray-700">{{ $user->email }}</p>
                        </div>
                    </div>
                    @endif

                    @if($user->nis)
                    <div class="flex items-center space-x-4 p-4 rounded-2xl bg-siakad-bg/50 hover:bg-siakad-bg transition-colors">
                        <div class="w-10 h-10 rounded-xl bg-white text-siakad-purple flex items-center justify-center shadow-sm">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-0.5">NIS/NIP</p>
                            <p class="font-bold text-gray-700">{{ $user->nis }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="space-y-6">
                    <div class="flex items-center space-x-4 p-4 rounded-2xl bg-siakad-bg/50 hover:bg-siakad-bg transition-colors">
                        <div class="w-10 h-10 rounded-xl bg-white text-siakad-purple flex items-center justify-center shadow-sm">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-0.5">Terdaftar Sejak</p>
                            <p class="font-bold text-gray-700">{{ $user->created_at->format('d F Y') }}</p>
                        </div>
                    </div>

                    @if($user->siswa)
                    <div class="flex items-center space-x-4 p-4 rounded-2xl bg-siakad-bg/50 hover:bg-siakad-bg transition-colors">
                         <div class="w-10 h-10 rounded-xl bg-white text-siakad-purple flex items-center justify-center shadow-sm">
                            <i class="fas fa-school"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-0.5">Kelas</p>
                            <p class="font-bold text-gray-700">{{ $user->siswa->kelas->name ?? '-' }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            @if($user->siswa)
            <div class="mt-8 pt-8 border-t border-gray-100">
                <h4 class="text-lg font-bold text-siakad-purple mb-6">Informasi Wali</h4>
                 <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                     <div class="p-4 rounded-2xl border border-gray-100">
                         <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Nama Ayah</p>
                         <p class="font-bold text-gray-700">{{ $user->siswa->nama_ayah ?? '-' }}</p>
                     </div>
                     <div class="p-4 rounded-2xl border border-gray-100">
                         <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Nama Ibu</p>
                         <p class="font-bold text-gray-700">{{ $user->siswa->nama_ibu ?? '-' }}</p>
                     </div>
                 </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

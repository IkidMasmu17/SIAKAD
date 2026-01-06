<!DOCTYPE html>
<html lang="en">

<head>
    @include('components._meta')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="bg-siakad-bg">
    <div id="app" class="flex min-h-screen" x-data="{ sidebarOpen: false, openDropdown: null }">
        {{-- [ Sidebar ] start --}}
        @include('components._sidebar-siswa')

        <div class="flex-1 flex flex-col">
            {{-- [ Header ] start --}}
            @include('components._nav-siswa')

            <main class="flex-1 p-8">
                {{-- [ breadcrumb ] start --}}
                @include('components._bread-siswa')

                {{-- [ flash message ] --}}
                <div class="max-w-7xl mx-auto mb-6">
                    @if(session('success'))
                        <div
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('failed'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center">
                            {{ session('failed') }}
                        </div>
                    @endif

                    @if($errors->any())
                        @foreach ($errors->all() as $err)
                            <div
                                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center mb-2">
                                {{ $err }}
                            </div>
                        @endforeach
                    @endif
                </div>

                {{-- [ page content ] start --}}
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    {{-- Script --}}
    @include('components._script')
</body>

</html>
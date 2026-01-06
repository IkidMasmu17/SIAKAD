<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
    <div>
        <h1 class="text-3xl font-extrabold text-siakad-purple tracking-tight leading-none">@yield('title-2')</h1>
        <p class="text-sm text-gray-400 mt-2 font-medium">@yield('describ')</p>
    </div>
    <nav class="flex" aria-label="Breadcrumb">
        <ol
            class="inline-flex items-center space-x-1 md:space-x-3 bg-white px-4 py-2 rounded-xl shadow-sm border border-gray-50">
            <li class="inline-flex items-center">
                <a href="{{ route('guru.index') }}"
                    class="inline-flex items-center text-xs font-bold text-gray-400 hover:text-siakad-purple transition-colors">
                    <i class="@yield('icon-r') mr-2"></i> Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-[10px] text-gray-300 mx-2"></i>
                    <a href="@yield('link') "
                        class="text-xs font-bold text-siakad-purple hover:text-siakad-light-purple transition-colors">@yield('title-3')</a>
                </div>
            </li>
        </ol>
    </nav>
</div>
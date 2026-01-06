@extends('layouts.admin')

@section('title', 'E-Voting | Vote')

@section('content')
    <div class="space-y-8">
        <!-- Header Section -->
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 animate-fade-in-down">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-siakad-purple">Pemilihan Ketua OSIS</h2>
                    <p class="text-gray-500 mt-1">Silakan berikan suara Anda untuk kandidat terbaik.</p>
                </div>
                <div class="flex items-center space-x-2 bg-siakad-bg/50 px-4 py-2 rounded-xl border border-gray-50">
                    <i class="fas fa-poll-h text-siakad-purple"></i>
                    <span class="text-sm font-bold text-gray-700">Periode 2024/2025</span>
                </div>
            </div>
        </div>

        <!-- Candidate Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php $no = 1; @endphp
            @foreach($names as $name)
                <div
                    class="group bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:shadow-indigo-100/50 transition-all duration-300 transform hover:-translate-y-2 animate-fade-in">
                    <div class="relative h-48 bg-gradient-to-br from-indigo-500 to-siakad-purple">
                        <div
                            class="absolute top-4 left-4 bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full border border-white/30">
                            <span class="text-white font-bold text-sm">#{{ $no++ }}</span>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center opacity-10">
                            <i class="fas fa-vote-yea text-9xl text-white"></i>
                        </div>
                    </div>

                    <div class="px-8 pb-8 -mt-20 relative">
                        <div class="flex justify-center">
                            <div
                                class="w-32 h-32 rounded-3xl bg-white p-1 shadow-lg ring-4 ring-white group-hover:ring-siakad-purple/20 transition-all">
                                <img src="{{ asset('img/avatar.png') }}" class="w-full h-full object-cover rounded-[1.4rem]"
                                    alt="{{ $name->name }}">
                            </div>
                        </div>

                        <div class="text-center mt-6">
                            <h3 class="text-xl font-bold text-gray-900">{{ $name->name }}</h3>
                            <p class="text-siakad-purple font-medium text-sm mt-1 italic">Kandidat Ketua OSIS</p>

                            <div class="mt-6 p-4 bg-gray-50 rounded-2xl border border-gray-100">
                                <p class="text-xs text-gray-500 line-clamp-2 italic">"Visi: Mewujudkan sekolah yang inovatif,
                                    berkarakter, dan inklusif bagi seluruh siswa."</p>
                            </div>

                            <form class="form-voting-single" data-name="{{ $name->name }}">
                                @csrf
                                <input type="hidden" name="calon_kandidat_id" value="{{ $name->name }}">
                                <button type="submit"
                                    class="w-full mt-8 py-3.5 px-6 bg-siakad-purple hover:bg-indigo-800 text-white font-bold rounded-2xl shadow-lg shadow-indigo-100 transition-all transform hover:scale-[1.02] active:scale-95 flex items-center justify-center space-x-2">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Berikan Suara</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Results Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 h-full animate-fade-in">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-lg font-bold text-siakad-purple">Hasil Voting Sementara</h3>
                        <i class="fas fa-chart-pie text-gray-300"></i>
                    </div>

                    <div class="relative aspect-square max-w-[280px] mx-auto">
                        <canvas id="myChart"></canvas>
                    </div>

                    <div class="mt-8 space-y-4">
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 rounded-full bg-siakad-purple"></div>
                                <span class="text-gray-600 font-medium">Kandidat Teratas</span>
                            </div>
                            <span class="font-bold text-siakad-purple">80%</span>
                        </div>
                        <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
                            <div class="bg-siakad-purple h-full" style="width: 80%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 h-full animate-fade-in">
                    <h3 class="text-lg font-bold text-siakad-purple mb-6">Informasi & Tata Cara</h3>
                    <div class="space-y-4 text-gray-600 text-sm leading-relaxed">
                        <div class="flex space-x-4 p-4 rounded-2xl bg-indigo-50 border border-indigo-100">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-white rounded-xl flex items-center justify-center text-siakad-purple shadow-sm">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div>
                                <p class="font-bold text-indigo-900">Satu Suara Satu Siswa</p>
                                <p class="mt-1">Setiap akun hanya diperbolehkan memberikan suara sebanyak satu kali.
                                    Pastikan pilihan Anda sudah benar.</p>
                            </div>
                        </div>
                        <div class="flex space-x-4 p-4 rounded-2xl bg-gray-50 border border-gray-100">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-white rounded-xl flex items-center justify-center text-gray-400 shadow-sm">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-700">Kerahasiaan Terjamin</p>
                                <p class="mt-1">Pilihan Anda dienkripsi dan tidak akan diketahui oleh pihak manapun termasuk
                                    panitia pemilihan.</p>
                            </div>
                        </div>
                        <div class="flex space-x-4 p-4 rounded-2xl bg-gray-50 border border-gray-100">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-white rounded-xl flex items-center justify-center text-gray-400 shadow-sm">
                                <i class="fas fa-history"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-700">Waktu Pemilihan</p>
                                <p class="mt-1">Pemilihan akan ditutup otomatis pada tanggal yang telah ditentukan oleh
                                    operator pusat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endpush

@push('js')
    <script src="{{ asset('bower_components/chart.js/js/Chart.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.form-voting-single').on('submit', function (event) {
                event.preventDefault();
                var candidateName = $(this).data('name');
                var form = $(this);
                var btn = form.find('button');

                if (!confirm('Anda yakin ingin memberikan suara untuk ' + candidateName + '?')) {
                    return;
                }

                $.ajax({
                    url: "{{ route('admin.e-voting.vote') }}",
                    method: 'POST',
                    dataType: 'JSON',
                    data: form.serialize(),
                    beforeSend: function () {
                        btn.addClass('opacity-50 pointer-events-none').find('span').text('Mengirim...');
                    },
                    success: function (data) {
                        if (data.errors) {
                            toastr.error(data.errors[0]);
                            btn.removeClass('opacity-50 pointer-events-none').find('span').text('Berikan Suara');
                        }

                        if (data.success) {
                            toastr.success(data.success);
                            // Redirect or refresh results
                            setTimeout(function () {
                                location.reload();
                            }, 1500);
                        }
                    },
                    error: function (xhr) {
                        btn.removeClass('opacity-50 pointer-events-none').find('span').text('Berikan Suara');
                        toastr.error('Terjadi kesalahan atau Anda sudah pernah memilih.');
                    }
                });
            });

            // Results Chart
            var ctx = document.getElementById("myChart");
            if (ctx) {
                var chartData = {
                    labels: [
                        @foreach($names as $name)
                            "{{ $name->name }}",
                        @endforeach
                    ],
                    datasets: [{
                        data: [
                            @foreach($names as $name)
                                {{ rand(10, 50) }}, // Dummy data for demo
                            @endforeach
                        ],
                        backgroundColor: [
                            "#4c3f91",
                            "#6366f1",
                            "#a5b4fc",
                            "#e0e7ff",
                            "#f1f5f9"
                        ],
                        borderWidth: 0
                    }]
                };

                var myDoughnutChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: chartData,
                    options: {
                        cutoutPercentage: 75,
                        legend: {
                            display: false
                        },
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        }
                    }
                });
            }
        });
    </script>
@endpush
@extends('layouts.admin')

@section('title', 'Referensi | Pengaturan Hak Akses')

@section('content')
    <div class="space-y-6">
        <!-- Info Card -->
        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-xl shadow-sm animate-fade-in-down">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-info-circle text-blue-400"></i>
                </div>
                <div class="ml-3 w-full">
                    <h3 class="text-sm font-bold text-blue-700 uppercase tracking-wide mb-2">Keterangan Modul</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs font-medium text-blue-800">
                        <ul class="list-disc pl-4 space-y-1">
                            <li><span class="font-bold">KA:</span> Kalender</li>
                            <li><span class="font-bold">SE:</span> Sekolah</li>
                            <li><span class="font-bold">PEL:</span> Pelajaran</li>
                            <li><span class="font-bold">PD:</span> Peserta Didik</li>
                            <li><span class="font-bold">AB:</span> Absensi</li>
                            <li><span class="font-bold">DN:</span> Daftar Nilai</li>
                        </ul>
                        <ul class="list-disc pl-4 space-y-1">
                            <li><span class="font-bold">PLG:</span> Pelanggaran</li>
                            <li><span class="font-bold">TE:</span> Template</li>
                            <li><span class="font-bold">LU:</span> Log User</li>
                            <li><span class="font-bold">R:</span> Referensi</li>
                            <li><span class="font-bold">BT:</span> Buku Tamu</li>
                            <li><span class="font-bold">KO:</span> Konsultasi</li>
                        </ul>
                        <ul class="list-disc pl-4 space-y-1">
                            <li><span class="font-bold">PER:</span> Perpustakaan</li>
                            <li><span class="font-bold">KE:</span> Keuangan</li>
                            <li><span class="font-bold">S&P:</span> Sarana & Prasarana</li>
                            <li><span class="font-bold">PMB:</span> Penerimaan Murid Baru</li>
                            <li><span class="font-bold">USBK:</span> Ujian Sekolah Berbasis Komputer</li>
                            <li><span class="font-bold">EVO:</span> E-voting</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Card -->
        <div class="w-full">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden animate-fade-in-up">
                <div class="p-6 border-b border-gray-50 flex items-center justify-between bg-siakad-bg/30">
                    <h3 class="text-lg font-bold text-siakad-purple"><i
                            class="fas fa-user-lock mr-2 text-siakad-purple"></i> Pengaturan Hak Akses</h3>
                </div>
                <div class="p-0">
                    <div class="table-responsive">
                        <table id="order-table" class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50/50">
                                <tr>
                                    <th
                                        class="px-3 py-3 font-bold text-siakad-purple tracking-wider sticky left-0 bg-gray-50 z-10">
                                        Nama</th>
                                    <th class="px-2 py-3 text-center" title="Kalender">KA</th>
                                    <th class="px-2 py-3 text-center" title="Sekolah">SE</th>
                                    <th class="px-2 py-3 text-center" title="Pelajaran">PEL</th>
                                    <th class="px-2 py-3 text-center" title="Peserta Didik">PD</th>
                                    <th class="px-2 py-3 text-center" title="Absensi">AB</th>
                                    <th class="px-2 py-3 text-center" title="Daftar Nilai">DN</th>
                                    <th class="px-2 py-3 text-center" title="Pelanggaran">PLG</th>
                                    <th class="px-2 py-3 text-center" title="Template">TE</th>
                                    <th class="px-2 py-3 text-center" title="Log User">LU</th>
                                    <th class="px-2 py-3 text-center" title="Referensi">R</th>
                                    <th class="px-2 py-3 text-center" title="Buku Tamu">BT</th>
                                    <th class="px-2 py-3 text-center" title="Perpustakaan">PER</th>
                                    <th class="px-2 py-3 text-center" title="Keuangan">KE</th>
                                    <th class="px-2 py-3 text-center" title="Sarana & Prasarana">S&P</th>
                                    <th class="px-2 py-3 text-center" title="Penerimaan Murid Baru">PMB</th>
                                    <th class="px-2 py-3 text-center" title="Ujian Sekolah Berbasis Komputer">USBK</th>
                                    <th class="px-2 py-3 text-center" title="E-voting">EVO</th>
                                    <th class="px-2 py-3 text-center" title="Konsultasi">KO</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <!-- Static Row 1 -->
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td
                                        class="px-3 py-3 font-medium text-gray-900 sticky left-0 bg-white z-10 border-r border-gray-100">
                                        <div class="flex items-center">
                                            <div
                                                class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold mr-2 text-xs">
                                                AF</div>
                                            <div>
                                                <div class="font-bold">Al Firah</div>
                                                <div class="text-xs text-gray-500">Guru / Pegawai</div>
                                            </div>
                                        </div>
                                    </td>
                                    @foreach(['kalender', 'sekolah', 'pelajaran', 'peserta_didik', 'absensi', 'daftar_nilai', 'pelanggaran', 'template', 'log_user', 'referensi', 'buku_tamu', 'perpustakaan', 'keuangan', 'sarana_prasarana', 'pmb', 'usbk', 'evoting', 'konsultasi'] as $module)
                                        <td class="px-2 py-3 text-center">
                                            <label class="inline-flex items-center">
                                                <input type="checkbox"
                                                    class="form-checkbox h-4 w-4 text-siakad-purple rounded border-gray-300 focus:ring-siakad-purple transition duration-150 ease-in-out cursor-pointer"
                                                    {{ in_array($module, ['kalender', 'pelajaran', 'peserta_didik', 'absensi', 'daftar_nilai', 'usbk', 'evoting', 'konsultasi']) ? 'checked' : '' }}
                                                    onclick="check('5935745', '#{{ $module }}1', '{{ $module }}')">
                                            </label>
                                        </td>
                                    @endforeach
                                </tr>

                                <!-- Static Row 2 -->
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td
                                        class="px-3 py-3 font-medium text-gray-900 sticky left-0 bg-white z-10 border-r border-gray-100">
                                        <div class="flex items-center">
                                            <div
                                                class="h-8 w-8 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold mr-2 text-xs">
                                                AS</div>
                                            <div>
                                                <div class="font-bold">Arifin Sitorus Pane</div>
                                                <div class="text-xs text-gray-500">Guru / Pegawai</div>
                                            </div>
                                        </div>
                                    </td>
                                    @foreach(['kalender', 'sekolah', 'pelajaran', 'peserta_didik', 'absensi', 'daftar_nilai', 'pelanggaran', 'template', 'log_user', 'referensi', 'buku_tamu', 'perpustakaan', 'keuangan', 'sarana_prasarana', 'pmb', 'usbk', 'evoting', 'konsultasi'] as $module)
                                        <td class="px-2 py-3 text-center">
                                            <label class="inline-flex items-center">
                                                <input type="checkbox"
                                                    class="form-checkbox h-4 w-4 text-siakad-purple rounded border-gray-300 focus:ring-siakad-purple transition duration-150 ease-in-out cursor-pointer"
                                                    {{ in_array($module, ['kalender', 'pelajaran', 'peserta_didik', 'absensi', 'daftar_nilai', 'usbk', 'evoting', 'konsultasi']) ? 'checked' : '' }}
                                                    onclick="check('5935745', '#{{ $module }}2', '{{ $module }}')">
                                            </label>
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <style>
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        /* Sticky Column Styles */
        table td:first-child,
        table th:first-child {
            position: sticky;
            left: 0;
            z-index: 20;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.05);
        }
    </style>
@endpush

@push('js')
    <script>
        // Dummy check function to simulate functionality
        function check(userId, selector, column) {
            // In a real application, this would use AJAX.
            // For now, we just simulate a success message.
            // console.log("Checking User: " + userId + ", Column: " + column);

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "2000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('Hak akses diperbarui');
        }

        $(document).ready(function () {
            // Any initialization logic if needed
        });
    </script>
@endpush
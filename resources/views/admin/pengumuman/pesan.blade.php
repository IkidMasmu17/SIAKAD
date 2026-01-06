@extends('layouts.admin')

@section('title', 'Pengumuman | Pesan')

@section('content')
    <div class="space-y-6">
        <!-- Info Alert -->
        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-xl shadow-sm animate-fade-in-down">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-info-circle text-blue-400"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-bold text-blue-700 uppercase tracking-wide">Informasi Pesan</h3>
                    <div class="mt-2 text-sm text-blue-600">
                        <p>Halaman ini digunakan untuk mengelola pesan dan pengumuman yang akan ditampilkan kepada pengguna.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Card -->
        <div class="w-full">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden animate-fade-in-up">
                <div class="p-6 border-b border-gray-50 flex items-center justify-between bg-siakad-bg/30">
                    <h3 class="text-lg font-bold text-siakad-purple"><i class="fas fa-bullhorn mr-2 text-siakad-purple"></i>
                        Daftar Pesan</h3>
                    <button type="button" id="add"
                        class="py-2 px-4 bg-siakad-purple hover:bg-indigo-800 text-white font-bold rounded-xl shadow-lg shadow-indigo-100 transition-all transform hover:-translate-y-0.5 active:translate-y-0 flex items-center">
                        <i class="fas fa-plus mr-2"></i> Tambah Pesan
                    </button>
                </div>
                <div class="p-0">
                    <div class="table-responsive">
                        <table id="order-table" class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50/50">
                                <tr>
                                    <th scope="col" class="px-6 py-4 font-bold text-siakad-purple tracking-wider">No</th>
                                    <th scope="col" class="px-6 py-4 font-bold text-siakad-purple tracking-wider">Judul</th>
                                    <th scope="col" class="px-6 py-4 font-bold text-siakad-purple tracking-wider">Set Waktu
                                    </th>
                                    <th scope="col" class="px-6 py-4 font-bold text-siakad-purple tracking-wider">Tanggal
                                        Upload</th>
                                    <th scope="col" class="px-6 py-4 font-bold text-siakad-purple tracking-wider">Tampil
                                        Pada</th>
                                    <th scope="col" class="px-6 py-4 font-bold text-siakad-purple tracking-wider">Status
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 font-bold text-siakad-purple tracking-wider text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <!-- DataTables will populate this -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    @include('admin.pengumuman.modals._pesan')

@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('bower_components/datedropper/css/datedropper.min.css') }}" />
    <style>
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        /* DataTables Customization for Tailwind */
        .dataTables_wrapper .dataTables_length select {
            padding-right: 2.5rem;
            border-radius: 0.75rem;
            border-color: #f3f4f6;
            font-size: 0.875rem;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 0.75rem;
            border-color: #f3f4f6;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #4c3f91 !important;
            color: white !important;
            border: none;
            border-radius: 0.5rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #e0e7ff !important;
            color: #4c3f91 !important;
            border: none;
            border-radius: 0.5rem;
        }

        table.dataTable.no-footer {
            border-bottom: 1px solid #f3f4f6;
        }
    </style>
@endpush

@push('js')
    <script src="{{ asset('bower_components/datedropper/js/datedropper.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#order-table').DataTable({
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari pesan...",
                    lengthMenu: "Tampilkan _MENU_ pesan",
                    paginate: {
                        first: '<i class="fas fa-angle-double-left"></i>',
                        last: '<i class="fas fa-angle-double-right"></i>',
                        previous: '<i class="fas fa-angle-left"></i>',
                        next: '<i class="fas fa-angle-right"></i>'
                    },
                    emptyTable: "Tidak ada data pesan"
                },
                dom: '<"flex flex-col md:flex-row justify-between items-center p-6 space-y-4 md:space-y-0"lf>rt<"flex flex-col md:flex-row justify-between items-center p-6 border-t border-gray-50"ip>',
                drawCallback: function () {
                    $('select').addClass('bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-siakad-purple focus:border-siakad-purple block w-full p-2.5');
                    $('input[type="search"]').addClass('bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-siakad-purple focus:border-siakad-purple block w-full p-2.5');
                }
            });

            $('#add').on('click', function () {
                $('#modal-pesan').modal('show');
            });

            $('#start_date').dateDropper({
                theme: 'leaf',
                format: 'd-m-Y'
            });

            $('#end_date').dateDropper({
                theme: 'leaf',
                format: 'd-m-Y'
            });
        });
    </script>
@endpush
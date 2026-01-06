@extends('layouts.admin')

@section('title', 'E-Voting | Pemilihan')

@section('content')
    <div class="space-y-6">
        <!-- Form Card (Top) -->
        <div class="w-full">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden animate-fade-in-down">
                <div class="p-6 border-b border-gray-50 flex items-center justify-between bg-siakad-bg/30">
                    <h3 class="text-lg font-bold text-siakad-purple"><i class="fas fa-vote-yea mr-2 text-siakad-purple"></i>
                        <span id="form-title">Tambah Pemilihan</span></h3>
                </div>
                <div class="p-8">
                    <form id="form-pemilihan">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Calon (Multiple Select) -->
                            <div class="space-y-2">
                                <label for="nama_calon"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Nama Calon
                                    / Kandidat</label>
                                <div class="relative group">
                                    <select name="nama_calon[]" id="nama_calon" class="form-control" multiple required>
                                        @foreach($ck as $cakan)
                                            <option value="{{ $cakan->name }}">{{ $cakan->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Posisi -->
                            <div class="space-y-2">
                                <label for="posisi"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Posisi /
                                    Jabatan</label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-briefcase text-sm"></i>
                                    </div>
                                    <select name="posisi" id="posisi"
                                        class="block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                                        required>
                                        <option value="">Pilih Posisi</option>
                                        @foreach($ps as $posisi)
                                            <option>{{ $posisi->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Date Mulai -->
                            <div class="space-y-2">
                                <label for="tanggal_mulai"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Tanggal
                                    Mulai</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-siakad-purple transition-colors">
                                        <i class="fas fa-calendar-alt text-sm"></i>
                                    </div>
                                    <input type="text" name="tanggal_mulai" id="tanggal_mulai" required readonly
                                        class="block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                                        placeholder="Pilih Tanggal Mulai">
                                </div>
                            </div>

                            <!-- Date Selesai -->
                            <div class="space-y-2">
                                <label for="tanggal_selesai"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Tanggal
                                    Selesai</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-siakad-purple transition-colors">
                                        <i class="fas fa-calendar-check text-sm"></i>
                                    </div>
                                    <input type="text" name="tanggal_selesai" id="tanggal_selesai" required readonly
                                        class="block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                                        placeholder="Pilih Tanggal Selesai">
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3 pt-6 border-t border-gray-50 mt-6">
                            <input type="hidden" name="hidden_id" id="hidden_id">
                            <input type="hidden" id="action" value="add">

                            <button type="submit" id="btn"
                                class="flex-1 md:flex-none py-3 px-10 bg-siakad-purple hover:bg-indigo-800 text-white font-bold rounded-xl shadow-lg shadow-indigo-100 transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                                <span>Simpan Pemilihan</span>
                            </button>

                            <button type="button" id="btn-cancel"
                                class="py-3 px-8 bg-gray-50 text-gray-500 font-bold rounded-xl hover:bg-gray-100 transition-all">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Table Card (Bottom) -->
        <div class="w-full">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden animate-fade-in">
                <div class="p-6 border-b border-gray-50 flex items-center justify-between bg-siakad-bg/30">
                    <h3 class="text-lg font-bold text-siakad-purple"><i
                            class="fas fa-list-check mr-2 text-siakad-purple"></i> Daftar Pemilihan E-Voting</h3>
                </div>
                <div class="p-8">
                    <div class="dt-responsive">
                        <table id="order-table" class="w-full text-sm text-left border-collapse">
                            <thead>
                                <tr
                                    class="text-xs font-bold text-gray-500 uppercase tracking-widest border-b border-gray-50">
                                    <th class="px-4 py-4 w-16">No</th>
                                    <th class="px-4 py-4">Kandidat</th>
                                    <th class="px-4 py-4">Jenis Pemilihan</th>
                                    <th class="px-4 py-4">Start Date</th>
                                    <th class="px-4 py-4">End Date</th>
                                    <th class="px-4 py-4 w-32">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modern Confirmation Modal --}}
    <div id="confirmModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"
                onclick="$('#confirmModal').addClass('hidden')"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-middle bg-white rounded-3xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fas fa-exclamation-triangle text-red-600"></i>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-bold text-gray-900" id="modal-title">Konfirmasi Hapus</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Apakah Anda yakin ingin menghapus data pemilihan ini?
                                    Tindakan ini tidak dapat dibatalkan.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse space-y-2 sm:space-y-0 sm:space-x-2 sm:space-x-reverse">
                    <button type="button" id="ok_button"
                        class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2.5 bg-red-600 text-base font-bold text-white hover:bg-red-700 focus:outline-none sm:w-auto sm:text-sm transition-all">
                        Hapus
                    </button>
                    <button type="button"
                        class="w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-4 py-2.5 bg-white text-base font-bold text-gray-700 hover:bg-gray-50 focus:outline-none sm:w-auto sm:text-sm transition-all"
                        onclick="$('#confirmModal').addClass('hidden')">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datedropper/css/datedropper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <style>
        /* Custom DataTable Styling to match Tailwind */
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            @apply px-4 py-2 bg-siakad-bg/50 border border-gray-100 rounded-xl text-sm outline-none focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            @apply rounded-xl border-none font-bold text-xs px-3 py-2 transition-all !important;
        }

        /* Fix Oversized Sorting Icons in DataTables */
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc:after {
            font-size: 0.8rem !important;
            bottom: 0.9em !important;
            opacity: 0.3;
        }

        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_desc:after {
            opacity: 1 !important;
            color: #4c3f91 !important;
        }

        .dataTables_wrapper .dataTables_info {
            @apply text-xs text-gray-400 font-medium pt-4;
        }

        table.dataTable thead th {
            @apply border-b border-gray-50 !important;
        }

        table.dataTable.no-footer {
            @apply border-b-0 !important;
        }

        .dataTables_filter {
            @apply mb-6;
        }

        /* Custom Select2 Tailwind Styling */
        .select2-container--default .select2-selection--multiple {
            @apply bg-siakad-bg/50 border-gray-100 rounded-xl min-h-[50px] transition-all;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            @apply ring-2 ring-siakad-purple border-siakad-purple outline-none;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            @apply bg-siakad-purple text-white border-none rounded-lg px-3 py-1 text-xs font-bold mt-2;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            @apply text-white mr-2 hover:text-gray-200 transition-colors;
        }

        .modal-backdrop {
            display: none !important;
        }
    </style>
@endpush

@push('js')
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('bower_components/datedropper/js/datedropper.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            var table = $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.e-voting.pemilihan') }}",
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'px-6 py-5 font-medium text-gray-900 w-16', orderable: false },
                    { data: 'name', name: 'name', className: 'px-6 py-5 text-gray-600 font-bold' },
                    { data: 'posisi', name: 'posisi', className: 'px-6 py-5 text-gray-500 italic' },
                    { data: 'start_date', name: 'start_date', className: 'px-6 py-5 text-gray-500' },
                    { data: 'end_date', name: 'end_date', className: 'px-6 py-5 text-gray-500' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'px-6 py-5 w-32' }
                ],
                order: [],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari pemilihan...",
                    lengthMenu: "Tampilkan _MENU_",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    paginate: {
                        first: '<i class="fas fa-angle-double-left"></i>',
                        last: '<i class="fas fa-angle-double-right"></i>',
                        previous: '<i class="fas fa-angle-left"></i>',
                        next: '<i class="fas fa-angle-right"></i>'
                    },
                    emptyTable: "Belum ada data pemilihan tersedia",
                    zeroRecords: "Data pemilihan tidak ditemukan"
                },
                drawCallback: function () {
                    $('.dataTables_paginate > .paginate_button').addClass('px-3 py-2');
                }
            });

            $('#nama_calon').select2({
                placeholder: "Pilih Kandidat",
                allowClear: true
            });

            $('#tanggal_mulai').dateDropper({
                theme: 'leaf',
                format: 'd-m-Y'
            });

            $('#tanggal_selesai').dateDropper({
                theme: 'leaf',
                format: 'd-m-Y'
            });

            // Form Handling
            $('#form-pemilihan').on('submit', function (event) {
                event.preventDefault();
                var action = $('#action').val();
                var url = (action === 'add') ? "{{ route('admin.e-voting.pemilihan') }}" : "{{ route('admin.e-voting.pemilihan-update') }}";

                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'JSON',
                    data: $(this).serialize(),
                    beforeSend: function () {
                        $('#btn').addClass('opacity-50 pointer-events-none').find('span').text('Memproses...');
                    },
                    success: function (data) {
                        $('#btn').removeClass('opacity-50 pointer-events-none').find('span').text(action === 'add' ? 'Simpan' : 'Update');

                        if (data.errors) {
                            toastr.error(data.errors[0]);
                        }

                        if (data.success) {
                            toastr.success(data.success);
                            resetForm();
                            table.ajax.reload();
                        }
                    },
                    error: function () {
                        $('#btn').removeClass('opacity-50 pointer-events-none').find('span').text(action === 'add' ? 'Simpan' : 'Update');
                        toastr.error('Terjadi kesalahan pada server');
                    }
                });
            });

            $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $(this).addClass('opacity-50 pointer-events-none');
                $.ajax({
                    url: '/admin/e-voting/pemilihan/' + id,
                    dataType: 'JSON',
                    success: function (data) {
                        $('.edit').removeClass('opacity-50 pointer-events-none');

                        // Reset multiple select first
                        $('#nama_calon').val(null).trigger('change');

                        // Set single value for edit (the controller returns single name for edit)
                        var option = new Option(data.name, data.name, true, true);
                        $('#nama_calon').append(option).trigger('change');

                        $('#posisi').val(data.posisi);

                        // Date handling
                        if (data.start_date) {
                            var d = new Date(data.start_date);
                            var formattedDate = ("0" + d.getDate()).slice(-2) + "-" + ("0" + (d.getMonth() + 1)).slice(-2) + "-" + d.getFullYear();
                            $('#tanggal_mulai').val(formattedDate);
                        }
                        if (data.end_date) {
                            var d = new Date(data.end_date);
                            var formattedDate = ("0" + d.getDate()).slice(-2) + "-" + ("0" + (d.getMonth() + 1)).slice(-2) + "-" + d.getFullYear();
                            $('#tanggal_selesai').val(formattedDate);
                        }

                        $('#hidden_id').val(id);
                        $('#action').val('edit');
                        $('#form-title').text('Edit Pemilihan');
                        $('#btn').removeClass('bg-siakad-purple').addClass('bg-siakad-light-purple').find('span').text('Update');

                        $('html, body').animate({ scrollTop: 0 }, 500);
                    }
                });
            });

            $('#btn-cancel').on('click', function () {
                resetForm();
            });

            function resetForm() {
                $('#form-pemilihan')[0].reset();
                $('#nama_calon').val(null).trigger('change');
                $('#action').val('add');
                $('#hidden_id').val('');
                $('#form-title').text('Tambah Pemilihan');
                $('#btn').removeClass('bg-siakad-light-purple').addClass('bg-siakad-purple').find('span').text('Simpan Pemilihan');
            }

            var del_id;
            $(document).on('click', '.delete', function () {
                del_id = $(this).attr('id');
                $('#confirmModal').removeClass('hidden');
            });

            $('#ok_button').click(function () {
                $.ajax({
                    url: '/admin/e-voting/pemilihan/hapus/' + del_id,
                    beforeSend: function () {
                        $('#ok_button').text('Menghapus...').addClass('opacity-50 pointer-events-none');
                    },
                    success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').addClass('hidden');
                            $('#ok_button').text('Hapus').removeClass('opacity-50 pointer-events-none');
                            table.ajax.reload();
                            toastr.success('Data berhasil dihapus');
                        }, 500);
                    }
                });
            });

        });
    </script>
@endpush
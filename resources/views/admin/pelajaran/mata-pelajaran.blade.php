@extends('layouts.admin')

@section('title', 'Pelajaran | Mata Pelajaran')

@section('content')
    <div class="space-y-6">
        <!-- Form Card (Top) -->
        <div class="w-full">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden animate-fade-in-down">
                <div class="p-6 border-b border-gray-50 flex items-center justify-between bg-siakad-bg/30">
                    <h3 class="text-lg font-bold text-siakad-purple"><i
                            class="fas fa-plus-circle mr-2 text-siakad-purple"></i> <span id="form-title">Tambah Mata
                            Pelajaran</span></h3>
                </div>
                <div class="p-8">
                    <form id="form-pelajaran">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-start">
                            <!-- Nama Pelajaran -->
                            <div class="space-y-2">
                                <label for="nama_pelajaran"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2 ml-1">Nama
                                    Pelajaran</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-siakad-purple transition-colors">
                                        <i class="fas fa-book text-sm"></i>
                                    </div>
                                    <input type="text" name="nama_pelajaran" id="nama_pelajaran" required
                                        class="block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                                        placeholder="Contoh: Matematika">
                                </div>
                            </div>

                            <!-- Kode Pelajaran -->
                            <div class="space-y-2">
                                <label for="kode_pelajaran"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2 ml-1">Kode
                                    Pelajaran</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-siakad-purple transition-colors">
                                        <i class="fas fa-qrcode text-sm"></i>
                                    </div>
                                    <input type="text" name="kode_pelajaran" id="kode_pelajaran" required
                                        class="block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                                        placeholder="Contoh: MAT-01">
                                </div>
                            </div>

                            <!-- Guru Pengajar -->
                            <div class="space-y-2">
                                <label for="guru_id"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2 ml-1">Guru
                                    Pengajar</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-chalkboard-teacher text-sm"></i>
                                    </div>
                                    <select name="guru_id" id="guru" required
                                        class="block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none appearance-none">
                                        <option value="">Pilih Guru Pengajar</option>
                                        @foreach($guru as $obj)
                                            <option value="{{$obj->id}}">{{$obj->nama_guru}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Keterangan -->
                            <div class="space-y-2 md:col-span-2">
                                <label for="keterangan"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2 ml-1">Keterangan</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-info-circle text-sm"></i>
                                    </div>
                                    <input type="text" name="keterangan" id="keterangan"
                                        class="block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                                        placeholder="Keterangan tambahan (opsional)">
                                </div>
                            </div>

                            <!-- Status Aktif -->
                            <div class="space-y-2 flex flex-col justify-end pb-2">
                                <div
                                    class="flex items-center space-x-3 ml-1 bg-siakad-bg/30 p-3 rounded-xl border border-gray-50 h-[50px]">
                                    <label for="aktif"
                                        class="text-xs font-bold text-gray-700 uppercase tracking-widest cursor-pointer">Status
                                        Aktif</label>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="aktif" id="aktif" class="sr-only peer" checked>
                                        <div onclick="document.getElementById('aktif').click()"
                                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-siakad-purple">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3 pt-6 border-t border-gray-50 mt-6">
                            <input type="hidden" name="id" id="id">

                            <button type="submit" id="btn"
                                class="flex-1 md:flex-none py-3 px-10 bg-siakad-purple hover:bg-indigo-800 text-white font-bold rounded-xl shadow-lg shadow-indigo-100 transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                                <span>Simpan Pelajaran</span>
                            </button>

                            <button type="reset" id="reset"
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
                    <h3 class="text-lg font-bold text-siakad-purple"><i class="fas fa-list-alt mr-2 text-siakad-purple"></i>
                        Daftar Mata Pelajaran</h3>
                </div>
                <div class="p-8">
                    <div class="dt-responsive">
                        <table id="order-table" class="w-full text-sm text-left border-collapse">
                            <thead>
                                <tr
                                    class="text-xs font-bold text-gray-500 uppercase tracking-widest border-b border-gray-50">
                                    <th class="px-4 py-4 w-16">No</th>
                                    <th class="px-4 py-4">Mata Pelajaran</th>
                                    <th class="px-4 py-4">Nama Guru</th>
                                    <th class="px-4 py-4 w-32 border-none">Status</th>
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
@endsection

@push('css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
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

        .dt-buttons {
            @apply hidden;
        }
    </style>
@endpush

@push('js')
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var resetForm = () => {
                $('#form-pelajaran')[0].reset();
                $('input[name=id]').val('');
                $('#btn').removeClass('bg-siakad-light-purple').addClass('bg-siakad-purple').find('span').text('Simpan Pelajaran');
                $('#form-title').text('Tambah Mata Pelajaran');
                $('#guru').val('').trigger('change');
            }

            var table = $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.pelajaran.mata-pelajaran') }}?req=table",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'px-6 py-5 font-medium text-gray-900 w-16', orderable: false },
                    { data: 'nama_pelajaran', className: 'px-6 py-5 text-gray-600 font-bold' },
                    { data: 'nama_guru', name: 'nama_guru', className: 'px-6 py-5 text-gray-500 italic' },
                    {
                        data: 'aktif',
                        className: 'px-6 py-5 w-32',
                        render: (data) => {
                            let color = data == 1 ? 'emerald' : 'red';
                            let text = data == 1 ? 'Aktif' : 'Non Aktif';
                            return `<span class="px-3 py-1 bg-${color}-50 text-${color}-600 rounded-lg text-xs font-bold border border-${color}-100 transition-all">${text}</span>`;
                        }
                    },
                    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'px-6 py-5 w-32' }
                ],
                order: [],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari pelajaran...",
                    lengthMenu: "Tampilkan _MENU_",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    paginate: {
                        first: '<i class="fas fa-angle-double-left"></i>',
                        last: '<i class="fas fa-angle-double-right"></i>',
                        previous: '<i class="fas fa-angle-left"></i>',
                        next: '<i class="fas fa-angle-right"></i>'
                    },
                    emptyTable: "Belum ada data pelajaran tersedia",
                    zeroRecords: "Data pelajaran tidak ditemukan"
                },
                drawCallback: function () {
                    $('.dataTables_paginate > .paginate_button').addClass('px-3 py-2');
                }
            });

            $('#form-pelajaran').on('submit', function (event) {
                event.preventDefault();
                var url = "{{ route('admin.pelajaran.mata-pelajaran.write') }}?req=write";
                var btn = $('#btn');

                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'JSON',
                    data: $(this).serialize(),
                    beforeSend: function () {
                        btn.addClass('opacity-50 pointer-events-none').find('span').text('Memproses...');
                    },
                    success: function (data) {
                        toastr.success('Perubahan berhasil disimpan');
                        resetForm();
                        table.ajax.reload();
                    },
                    error: function (data) {
                        btn.removeClass('opacity-50 pointer-events-none').find('span').text('Simpan Pelajaran');
                        if (typeof data.responseJSON.message == 'string')
                            return Swal.fire('Error', data.responseJSON.message, 'error');
                        else if (typeof data.responseJSON == 'string')
                            return Swal.fire('Error', data.responseJSON, 'error');
                    }
                });
            });

            $('#order-table').on('click', '.btn-edit', function (ev) {
                var id = $(this).attr('data-id');
                $(this).addClass('opacity-50 pointer-events-none');
                $.get("{{route('admin.pelajaran.mata-pelajaran')}}?req=single&id=" + id, function (data, status) {
                    $('.btn-edit').removeClass('opacity-50 pointer-events-none');
                    $('input[name=id]').val(data.id);
                    $('input[name=nama_pelajaran]').val(data.nama_pelajaran).focus();
                    $('input[name=kode_pelajaran]').val(data.kode_pelajaran);
                    $('input[name=keterangan]').val(data.keterangan);
                    $('input[name=aktif]').prop('checked', data.aktif == 1);
                    $('#guru').val(data.guru_id);

                    $('#form-title').text('Edit Mata Pelajaran');
                    $('#btn').removeClass('bg-siakad-purple').addClass('bg-siakad-light-purple').find('span').text('Update Pelajaran');

                    $('html, body').animate({ scrollTop: 0 }, 500);
                });
            });

            $('#reset').click(() => {
                resetForm();
            });

            $("#order-table").on('click', '.btn-delete', function () {
                var id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Konfirmasi Hapus',
                    text: "Apa anda yakin untuk menghapus data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4c3f91',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    customClass: {
                        popup: 'rounded-3xl',
                        confirmButton: 'rounded-xl px-6 py-2.5 font-bold',
                        cancelButton: 'rounded-xl px-6 py-2.5 font-bold'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('admin.pelajaran.mata-pelajaran.write') }}?req=delete&id=" + id,
                            method: "POST",
                            success: function (data) {
                                toastr.success('Data berhasil dihapus');
                                table.ajax.reload();
                            },
                            error: function (data) {
                                toastr.error('Terjadi kesalahan saat menghapus data');
                            }
                        });
                    }
                })
            });
        });
    </script>
@endpush
@extends('layouts.admin')

@section('title', 'Referensi | Semester')

@section('content')
    <div class="space-y-6">
        <!-- Form Card (Top) -->
        <div class="w-full">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden animate-fade-in-down">
                <div class="p-6 border-b border-gray-50 flex items-center justify-between bg-siakad-bg/30">
                    <h3 class="text-lg font-bold text-siakad-purple"><i
                            class="fas fa-calendar-alt mr-2 text-siakad-purple"></i> Form Semester</h3>
                    <div class="flex items-center space-x-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span class="text-xs font-medium text-gray-500 uppercase tracking-wider">Input Mode</span>
                    </div>
                </div>
                <div class="p-8">
                    <form id="form-semester">
                        @csrf
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Semester Input -->
                            <div class="space-y-2">
                                <label for="semester"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Semester</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-siakad-purple transition-colors">
                                        <i class="fas fa-bookmark text-xs"></i>
                                    </div>
                                    <input type="text" name="semester" id="semester"
                                        class="block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                                        placeholder="Contoh: Ganjil, Genap">
                                </div>
                                <span id="form_result" class="text-xs text-red-500 font-medium ml-1"></span>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3 pt-6 border-t border-gray-50 mt-6">
                            <input type="hidden" name="hidden_id" id="hidden_id">
                            <input type="hidden" id="action" val="add">
                            <button type="submit" id="btn"
                                class="flex-1 md:flex-none py-3 px-10 bg-siakad-purple hover:bg-indigo-800 text-white font-bold rounded-xl shadow-lg shadow-indigo-100 transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                                Simpan Data
                            </button>
                            <button type="reset"
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
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden animate-fade-in-up">
                <div class="p-6 border-b border-gray-50 flex items-center justify-between bg-siakad-bg/30">
                    <h3 class="text-lg font-bold text-siakad-purple"><i class="fas fa-list-alt mr-2 text-siakad-purple"></i>
                        Data Semester</h3>
                </div>
                <div class="p-0">
                    <div class="table-responsive">
                        <table id="order-table" class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50/50">
                                <tr>
                                    <th scope="col" class="px-6 py-4 font-bold text-siakad-purple tracking-wider">No</th>
                                    <th scope="col" class="px-6 py-4 font-bold text-siakad-purple tracking-wider">Semester
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 font-bold text-siakad-purple tracking-wider text-center"
                                        style="width: 15%">Aksi</th>
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
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
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
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.referensi.semester') }}",
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'px-6 py-4 align-middle font-medium text-gray-900' },
                    { data: 'name', name: 'name', class: 'px-6 py-4 align-middle text-gray-700' },
                    { data: 'action', name: 'action', class: 'px-6 py-4 align-middle text-center', orderable: false, searchable: false }
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari data...",
                    lengthMenu: "Tampilkan _MENU_ data",
                    paginate: {
                        first: '<i class="fas fa-angle-double-left"></i>',
                        last: '<i class="fas fa-angle-double-right"></i>',
                        previous: '<i class="fas fa-angle-left"></i>',
                        next: '<i class="fas fa-angle-right"></i>'
                    }
                },
                dom: '<"flex flex-col md:flex-row justify-between items-center p-6 space-y-4 md:space-y-0"lf>rt<"flex flex-col md:flex-row justify-between items-center p-6 border-t border-gray-50"ip>',
                drawCallback: function () {
                    $('select').addClass('bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-siakad-purple focus:border-siakad-purple block w-full p-2.5');
                    $('input[type="search"]').addClass('bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-siakad-purple focus:border-siakad-purple block w-full p-2.5');
                }
            });

            $('#form-semester').on('submit', function (event) {
                event.preventDefault();
                var url = '';

                if ($('#action').val() == 'add') {
                    url = "{{ route('admin.referensi.semester') }}";
                }

                if ($('#action').val() == 'edit') {
                    url = "{{ route('admin.referensi.semester-update') }}";
                }

                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'JSON',
                    data: $(this).serialize(),
                    success: function (data) {
                        var html = '';
                        if (data.errors) {
                            html = data.errors[0];
                            $('#semester').addClass('border-red-500 focus:ring-red-500 focus:border-red-500');
                            toastr.error(html);
                        }

                        if (data.success) {
                            toastr.success('Data berhasil disimpan!');
                            $('#semester').removeClass('border-red-500 focus:ring-red-500 focus:border-red-500');
                            $('#form-semester')[0].reset();
                            $('#action').val('add');
                            $('#hidden_id').val('');
                            $('#btn').html('Simpan Data');
                            $('#order-table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    }
                });
            });

            $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: '/admin/referensi/semester/' + id,
                    dataType: 'JSON',
                    success: function (data) {
                        $('#semester').val(data.semester.name);
                        $('#hidden_id').val(data.semester.id);
                        $('#action').val('edit');
                        $('#btn').html('Update Data');
                    }
                });
            });

            var user_id;
            $(document).on('click', '.delete', function () {
                user_id = $(this).attr('id');
                Swal.fire({
                    title: 'Konfirmasi Hapus',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#4c3f91',
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
                            url: '/admin/referensi/semester/hapus/' + user_id,
                            beforeSend: function () {
                            }, success: function (data) {
                                toastr.success('Data berhasil dihapus');
                                $('#order-table').DataTable().ajax.reload();
                            }
                        });
                    }
                })
            });
        });
    </script>
@endpush
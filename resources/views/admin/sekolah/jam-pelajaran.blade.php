@extends('layouts.admin')

@section('title', 'Sekolah | Jam Pelajaran')

@section('content')
    <div class="space-y-6">
        <!-- Form Card (Top) -->
        <div class="w-full">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden animate-fade-in-down">
                <div class="p-6 border-b border-gray-50 flex items-center justify-between bg-siakad-bg/30">
                    <h3 class="text-lg font-bold text-siakad-purple"><i
                            class="fas fa-plus-circle mr-2 text-siakad-purple"></i> Pengaturan Jam Pelajaran</h3>
                </div>
                <div class="p-8">
                    <form id="form-jam-pelajaran">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Hari -->
                            <div class="space-y-2">
                                <label for="hari"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Hari</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-siakad-purple transition-colors">
                                        <i class="fas fa-calendar-day text-xs"></i>
                                    </div>
                                    <select name="hari" id="hari" required
                                        class="block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none appearance-none">
                                        <option value="">Pilih Hari</option>
                                        <option value="senin">Senin</option>
                                        <option value="selasa">Selasa</option>
                                        <option value="rabu">Rabu</option>
                                        <option value="kamis">Kamis</option>
                                        <option value="jumat">Jumat</option>
                                        <option value="sabtu">Sabtu</option>
                                        <option value="minggu">Minggu</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Jam Ke -->
                            <div class="space-y-2">
                                <label for="jam_ke"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Jam
                                    Ke-</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-siakad-purple transition-colors">
                                        <i class="fas fa-sort-numeric-up text-xs"></i>
                                    </div>
                                    <input type="number" name="jam_ke" id="jam_ke" required
                                        class="block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                                        placeholder="Contoh: 1">
                                </div>
                            </div>

                            <!-- Jam Mulai -->
                            <div class="space-y-2">
                                <label for="jam_mulai"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Jam
                                    Mulai</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-clock text-xs"></i>
                                    </div>
                                    <input id="jam_mulai" type="text" name="jam_mulai" required readonly
                                        class="clockpicker block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                                        placeholder="07:00">
                                </div>
                            </div>

                            <!-- Jam Selesai -->
                            <div class="space-y-2">
                                <label for="jam_selesai"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Jam
                                    Selesai</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-history text-xs"></i>
                                    </div>
                                    <input id="jam_selesai" type="text" name="jam_selesai" required readonly
                                        class="clockpicker block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                                        placeholder="08:00">
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3 pt-6 border-t border-gray-50 mt-6">
                            <input type="hidden" name="id" id="id">
                            <button type="submit" id="btn-save"
                                class="flex-1 md:flex-none py-3 px-10 bg-siakad-purple hover:bg-indigo-800 text-white font-bold rounded-xl shadow-lg shadow-indigo-100 transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                                <span>Simpan Jam</span>
                            </button>
                            <button type="button" id="reset-form"
                                class="py-3 px-8 bg-gray-50 text-gray-500 font-bold rounded-xl hover:bg-gray-100 transition-all">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Results Section -->
        <div id="showjpcard" class="animate-fade-in">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu']; @endphp
                @foreach($days as $day)
                    @include('admin.sekolah.jam-pelajaran-table-hari', ['hari' => ucfirst($day), 'data' => $data[$day] ?? []])
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-clockpicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <style>
        /* Custom style for clockpicker to match Tailwind */
        .popover {
            border-radius: 1.5rem !important;
            border: 1px solid #f3f4f6 !important;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1) !important;
        }
    </style>
@endpush

@push('js')
    <script src="{{ asset('js/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.clockpicker').clockpicker({ donetext: 'Pilih', autoclose: true });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var resetForm = () => {
                $('#form-jam-pelajaran')[0].reset();
                $('input[name=id]').val('');
                $('#btn-save').find('span').text('Simpan Jam');
            };

            $("#reset-form").click(() => {
                resetForm();
            });

            $('#form-jam-pelajaran').on('submit', function (event) {
                event.preventDefault();
                var url = "{{ route('admin.sekolah.jam.write') }}?req=write";
                var btn = $('#btn-save');

                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'JSON',
                    data: $(this).serialize(),
                    beforeSend: function () {
                        btn.addClass('opacity-50 pointer-events-none').find('span').text('Memproses...');
                    },
                    success: function (data) {
                        toastr.success('Jam pelajaran berhasil disimpan');
                        resetForm();
                        setTimeout(() => location.reload(), 800);
                    },
                    error: function (data) {
                        btn.removeClass('opacity-50 pointer-events-none').find('span').text('Simpan Jam');
                        if (typeof data.responseJSON.message == 'string')
                            return Swal.fire('Error', data.responseJSON.message, 'error');
                    }
                });
            });

            $(document).on('click', '.btn-delete', function () {
                var id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Konfirmasi Hapus',
                    text: "Jam ini akan dihapus dari sistem.",
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
                            url: "{{ route('admin.sekolah.jam.write') }}?req=delete&id=" + id,
                            method: "POST",
                            success: function (data) {
                                toastr.success('Data berhasil dihapus');
                                setTimeout(() => location.reload(), 500);
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
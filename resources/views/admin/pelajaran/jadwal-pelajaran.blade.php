@extends('layouts.admin')

@section('title', 'Pelajaran | Jadwal Pelajaran')

@section('content')
    <div class="space-y-6">
        <!-- Form Card (Top) -->
        <div class="w-full">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden animate-fade-in-down">
                <div class="p-6 border-b border-gray-50 flex items-center justify-between bg-siakad-bg/30">
                    <h3 class="text-lg font-bold text-siakad-purple"><i
                            class="fas fa-calendar-plus mr-2 text-siakad-purple"></i> Input Jadwal Pelajaran</h3>
                </div>
                <div class="p-8">
                    <form id="form-jadwal-pelajaran">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Kelas -->
                            <div class="space-y-2">
                                <label for="kelas"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Kelas</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-siakad-purple transition-colors">
                                        <i class="fas fa-door-open text-xs"></i>
                                    </div>
                                    <select name="kelas_id" id="kelas" required
                                        class="block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none appearance-none">
                                        <option value="">Pilih Kelas</option>
                                        @foreach($kelas as $obj)
                                            <option value="{{ $obj->id }}">{{ $obj->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Mata Pelajaran -->
                            <div class="space-y-2">
                                <label for="mata_pelajaran_id"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Mata
                                    Pelajaran</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-book-open text-xs"></i>
                                    </div>
                                    <select name="mata_pelajaran_id" id="mata_pelajaran_id" required
                                        class="block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none appearance-none">
                                        <option value="">Pilih Pelajaran</option>
                                        @foreach($pelajaran as $obj)
                                            <option value="{{$obj->id}}">{{$obj->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Hari -->
                            <div class="space-y-2">
                                <label for="hari"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Hari</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
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

                            <!-- Semester -->
                            <div class="space-y-2">
                                <label for="semester"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Semester</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-layer-group text-xs"></i>
                                    </div>
                                    <select name="semester" id="semester" required
                                        class="block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none appearance-none">
                                        <option value="ganjil">Ganjil</option>
                                        <option value="genap">Genap</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tahun Ajaran -->
                            <div class="space-y-2">
                                <label for="tahun_ajaran"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Tahun
                                    Ajaran</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-graduation-cap text-xs"></i>
                                    </div>
                                    <select name="tahun_ajaran" id="tahun_ajaran" required
                                        class="block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none appearance-none">
                                        <option value="2019/2020">2019/2020</option>
                                        <option value="2020/2021">2020/2021</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Keterangan -->
                            <div class="space-y-2">
                                <label for="keterangan"
                                    class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Keterangan</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <i class="fas fa-comment-dots text-xs"></i>
                                    </div>
                                    <input type="text" name="keterangan" id="keterangan"
                                        class="block w-full pl-11 pr-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                                        placeholder="Opsional">
                                </div>
                            </div>
                        </div>

                        <!-- Jam Ke Label -->
                        <div class="mt-8 mb-4 border-t border-gray-50 pt-6">
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1 mb-4"><i
                                    class="fas fa-clock mr-1.5 text-siakad-purple"></i> Jam Pelajaran Ke-</label>
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                                @foreach ($jam_pelajaran as $key => $jp)
                                    @if($jp['id'] != '-')
                                        <label class="relative group cursor-pointer transition-all">
                                            <input type="radio" name="jam_pelajaran" value="{{ $jp['id'] }}" class="sr-only peer"
                                                required>
                                            <div
                                                class="w-full py-4 px-3 bg-siakad-bg/50 border border-gray-100 rounded-2xl flex flex-col items-center justify-center transition-all peer-checked:bg-siakad-purple peer-checked:border-siakad-purple peer-checked:shadow-lg peer-checked:shadow-indigo-100 hover:bg-white group-hover:shadow-md">
                                                <span
                                                    class="text-xs font-bold text-gray-800 peer-checked:text-white transition-colors">#
                                                    {{ $jp['id'] }}</span>
                                                <span
                                                    class="text-[10px] text-gray-400 peer-checked:text-indigo-100 transition-colors mt-0.5 tracking-tighter">{{ $jp['label'] }}</span>
                                            </div>
                                        </label>
                                    @else
                                        <div
                                            class="w-full py-4 px-3 bg-gray-50/50 border border-dashed border-gray-200 rounded-2xl flex flex-col items-center justify-center grayscale opacity-50">
                                            <span
                                                class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Istirahat</span>
                                            <span class="text-[9px] text-gray-400 mt-0.5 tracking-tighter">{{ $jp['label'] }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="flex items-center space-x-3 pt-6 border-t border-gray-50 mt-6">
                            <input type="hidden" name="id" id="id">
                            <button type="submit" id="btn-save"
                                class="flex-1 md:flex-none py-3 px-10 bg-siakad-purple hover:bg-indigo-800 text-white font-bold rounded-xl shadow-lg shadow-indigo-100 transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                                <span>Simpan Jadwal</span>
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

        <!-- Filter & Tampil Section -->
        <div
            class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden animate-fade-in shadow-indigo-100/30">
            <div class="p-8">
                <h3 class="text-lg font-bold text-siakad-purple mb-6 flex items-center">
                    <i class="fas fa-search mr-2"></i> Tampilkan Jadwal
                </h3>
                <form method="get" action="{{route('admin.pelajaran.jadwal-pelajaran')}}">
                    <input type="hidden" name="req" value="table">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-end">
                        <div class="space-y-2">
                            <label
                                class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Kelas</label>
                            <select name="kelas_id"
                                class="block w-full pl-4 pr-10 py-3 bg-siakad-bg/30 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none appearance-none"
                                required>
                                @foreach($kelas as $obj)
                                    <option value="{{$obj->id}}" {{ request('kelas_id') == $obj->id ? 'selected' : '' }}>
                                        {{$obj->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label
                                class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Semester</label>
                            <select name="semester"
                                class="block w-full pl-4 pr-10 py-3 bg-siakad-bg/30 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none appearance-none"
                                required>
                                <option value="ganjil" {{ request('semester') == 'ganjil' ? 'selected' : '' }}>Ganjil</option>
                                <option value="genap" {{ request('semester') == 'genap' ? 'selected' : '' }}>Genap</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Tahun
                                Ajaran</label>
                            <select name="tahun_ajaran"
                                class="block w-full pl-4 pr-10 py-3 bg-siakad-bg/30 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none appearance-none"
                                required>
                                @foreach($tahun_ajaran as $obj)
                                    <option value="{{$obj}}" {{ request('tahun_ajaran') == $obj ? 'selected' : '' }}>{{$obj}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full py-3.5 px-6 bg-indigo-50 hover:bg-siakad-purple hover:text-white text-siakad-purple font-bold rounded-xl transition-all flex items-center justify-center space-x-2 border border-indigo-100 group">
                                <i class="fas fa-eye group-hover:scale-110 transition-transform"></i>
                                <span>Tampilkan</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Results Area -->
        <div id="showjpcard" class="animate-fade-in-up">
            @if(request('req') == 'table')
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu']; @endphp
                    @foreach($days as $day)
                        @include('admin.pelajaran.jadwal-pelajaran-table-hari', ['hari' => ucfirst($day), 'data' => $data[$day] ?? []])
                    @endforeach
                </div>
            @else
                <div class="bg-indigo-50/50 rounded-3xl p-12 text-center border-2 border-dashed border-indigo-100">
                    <div
                        class="w-20 h-20 bg-white rounded-2xl flex items-center justify-center mx-auto mb-6 text-siakad-purple shadow-sm ring-8 ring-indigo-50">
                        <i class="fas fa-calendar-alt text-3xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900">Belum Ada Jadwal Ditampilkan</h4>
                    <p class="text-gray-500 mt-2 max-w-sm mx-auto italic">Silakan pilih filter kelas, semester, dan tahun ajaran
                        di atas untuk melihat jadwal pelajaran.</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <style>
        /* Radio styling refinement */
        .peer:checked+div {
            @apply ring-4 ring-indigo-50;
        }
    </style>
@endpush

@push('js')
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var resetForm = () => {
                $('#form-jadwal-pelajaran')[0].reset();
                $('input[name=id]').val('');
                $('#btn-save').find('span').text('Simpan Jadwal');
                // Select first real radio
                $('input[name=jam_pelajaran][value="1"]').prop('checked', true);
            };

            $("#reset-form").click(() => {
                resetForm();
            });

            $('#form-jadwal-pelajaran').on('submit', function (event) {
                event.preventDefault();
                var url = "{{ route('admin.pelajaran.jadwal-pelajaran.write') }}?req=write";
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
                        toastr.success('Jadwal berhasil diperbarui');
                        resetForm();
                        // Redirect or reload with current filters to see changes
                        var currentUrl = new URL(window.location.href);
                        if (currentUrl.searchParams.get('req') === 'table') {
                            setTimeout(() => location.reload(), 1000);
                        }
                    },
                    error: function (data) {
                        btn.removeClass('opacity-50 pointer-events-none').find('span').text('Simpan Jadwal');
                        if (typeof data.responseJSON.message == 'string')
                            return Swal.fire('Error', data.responseJSON.message, 'error');
                    }
                });
            });

            $(document).on('click', '.btn-delete', function () {
                var id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Konfirmasi Hapus',
                    text: "Jadwal ini akan dihapus permanen.",
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
                            url: "{{ route('admin.pelajaran.jadwal-pelajaran.write') }}?req=delete&id=" + id,
                            method: "POST",
                            success: function (data) {
                                toastr.success('Jadwal berhasil dihapus');
                                setTimeout(() => location.reload(), 500);
                            },
                            error: function (data) {
                                toastr.error('Gagal menghapus jadwal');
                            }
                        });
                    }
                })
            });
        });
    </script>
@endpush
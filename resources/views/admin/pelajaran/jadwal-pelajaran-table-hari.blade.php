<div
  class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden h-full group hover:shadow-md transition-all duration-300">
  <div
    class="p-4 border-b border-gray-50 flex items-center justify-between bg-siakad-bg/30 group-hover:bg-siakad-purple/5 transition-colors">
    <h4 class="text-sm font-bold text-siakad-purple uppercase tracking-wider">{{ $hari }}</h4>
    <span
      class="text-[10px] font-bold text-gray-400 bg-white px-2 py-0.5 rounded-full border border-gray-50 uppercase tracking-tighter">Jadwal
      Harian</span>
  </div>
  <div class="p-0">
    <div class="overflow-x-auto">
      <table class="w-full text-xs text-left border-collapse">
        <thead>
          <tr class="text-[10px] font-bold text-gray-500 uppercase tracking-widest bg-gray-50/50">
            <th class="px-4 py-3 w-12 border-b border-gray-100 italic">Jam</th>
            <th class="px-4 py-3 border-b border-gray-100">Mata Pelajaran</th>
            <th class="px-4 py-4 w-12 border-b border-gray-100 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
          @forelse($data as $key => $obj)
            <tr class="hover:bg-gray-50/50 transition-colors">
              <td class="px-4 py-3 font-bold text-siakad-purple italic bg-siakad-bg/10 text-center">
                {{ $obj->jam_pelajaran }}</td>
              <td class="px-4 py-3 font-medium text-gray-700">
                <div class="flex flex-col">
                  <span class="font-bold">{{ $obj->mataPelajaran->nama_pelajaran ?? '-' }}</span>
                  <span class="text-[10px] text-gray-400 italic">{{ $obj->mataPelajaran->guru->nama_guru ?? '' }}</span>
                </div>
              </td>
              <td class="px-4 py-3 text-center">
                <button data-id="{{$obj->id}}" type="button"
                  class="btn-delete p-2 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all"
                  title="Hapus">
                  <i class="fas fa-trash-alt text-xs"></i>
                </button>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="px-4 py-8 text-center text-gray-400 italic">
                <i class="fas fa-calendar-times mb-2 text-lg"></i>
                <p>Tidak ada jadwal</p>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
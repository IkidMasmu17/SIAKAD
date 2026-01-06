<div
  class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden h-full group hover:shadow-md transition-all duration-300">
  <div
    class="p-4 border-b border-gray-50 flex items-center justify-between bg-siakad-bg/30 group-hover:bg-siakad-purple/5 transition-colors">
    <h4 class="text-sm font-bold text-siakad-purple uppercase tracking-wider">{{ $hari }}</h4>
    <div class="flex items-center space-x-1">
      <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
      <span class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter">Aktif</span>
    </div>
  </div>
  <div class="p-0">
    <div class="overflow-x-auto">
      <table class="w-full text-xs text-left border-collapse">
        <thead>
          <tr class="text-[10px] font-bold text-gray-500 uppercase tracking-widest bg-gray-50/50">
            <th class="px-4 py-3 w-12 border-b border-gray-100 italic">Ke</th>
            <th class="px-4 py-3 border-b border-gray-100 italic">Rentang Waktu</th>
            <th class="px-4 py-3 w-12 border-b border-gray-100 text-center uppercase tracking-tighter">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
          @forelse($data as $key => $obj)
            <tr class="hover:bg-gray-50/50 transition-colors">
              <td class="px-4 py-3">
                <div
                  class="w-7 h-7 bg-siakad-purple text-white rounded-lg flex items-center justify-center font-bold text-[10px]">
                  {{ $obj->jam_ke }}
                </div>
              </td>
              <td class="px-4 py-3 font-medium text-gray-700">
                <span class="bg-indigo-50 text-siakad-purple px-2 py-1 rounded-md border border-indigo-100">
                  {{ substr($obj->jam_mulai, 0, 5) }} - {{ substr($obj->jam_selesai, 0, 5) }}
                </span>
              </td>
              <td class="px-4 py-3 text-center">
                <button data-id="{{$obj->id}}" type="button"
                  class="btn-delete p-2 text-red-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all"
                  title="Hapus">
                  <i class="fas fa-trash-alt text-xs"></i>
                </button>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="px-4 py-8 text-center text-gray-400 italic">
                <i class="fas fa-clock mb-2 text-lg"></i>
                <p>Data belum diatur</p>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
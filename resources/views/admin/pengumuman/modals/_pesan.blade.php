<div class="modal fade" id="modal-pesan" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content rounded-3xl border-0 shadow-2xl overflow-hidden">
      <div class="modal-header bg-siakad-bg/30 border-b border-gray-50 px-8 py-6">
        <h4 class="modal-title text-xl font-bold text-siakad-purple">
          <i class="fas fa-edit mr-2"></i> Tambah Pesan
        </h4>
        <button type="button" class="close text-gray-400 hover:text-red-500 transition-colors opacity-100"
          data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-8">
        <form action="">
          <div class="space-y-6">
            <!-- Judul -->
            <div class="space-y-2">
              <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Judul</label>
              <input type="text" name="title" id="title"
                class="block w-full px-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                placeholder="Masukkan judul pesan...">
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
              <!-- Pengaturan Pesan -->
              <div class="lg:col-span-4 space-y-3">
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Validasi
                  Pesan</label>
                <div class="bg-gray-50/50 rounded-xl p-4 border border-gray-50 space-y-3">
                  <label class="flex items-center space-x-3 cursor-pointer group">
                    <input type="checkbox" name="message_option[]" value="Notification Message" checked
                      class="form-checkbox h-5 w-5 text-siakad-purple rounded border-gray-300 focus:ring-siakad-purple transition duration-150 ease-in-out">
                    <span
                      class="text-sm font-medium text-gray-700 group-hover:text-siakad-purple transition-colors">Notifikasi
                      Pesan</span>
                  </label>
                  <label class="flex items-center space-x-3 cursor-pointer group">
                    <input type="checkbox" name="message_option[]" value="Dashboard Notification"
                      class="form-checkbox h-5 w-5 text-siakad-purple rounded border-gray-300 focus:ring-siakad-purple transition duration-150 ease-in-out">
                    <span
                      class="text-sm font-medium text-gray-700 group-hover:text-siakad-purple transition-colors">Dashboard
                      Notifikasi</span>
                  </label>
                </div>
              </div>

              <!-- Set Waktu -->
              <div class="lg:col-span-3 space-y-3">
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Set Waktu</label>
                <div class="bg-gray-50/50 rounded-xl p-4 border border-gray-50 space-y-3">
                  <label class="flex items-center space-x-3 cursor-pointer group">
                    <input type="radio" name="message_time" value="Permanen" checked
                      class="form-radio h-5 w-5 text-siakad-purple border-gray-300 focus:ring-siakad-purple transition duration-150 ease-in-out">
                    <span
                      class="text-sm font-medium text-gray-700 group-hover:text-siakad-purple transition-colors">Permanen</span>
                  </label>
                  <label class="flex items-center space-x-3 cursor-pointer group">
                    <input type="radio" name="message_time" value="Using Time"
                      class="form-radio h-5 w-5 text-siakad-purple border-gray-300 focus:ring-siakad-purple transition duration-150 ease-in-out">
                    <span
                      class="text-sm font-medium text-gray-700 group-hover:text-siakad-purple transition-colors">Jangka
                      Waktu</span>
                  </label>
                </div>
              </div>

              <!-- Jangka Waktu Input -->
              <div class="lg:col-span-5 space-y-3">
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Rentang
                  Waktu</label>
                <div class="grid grid-cols-2 gap-4">
                  <div class="space-y-1">
                    <label for="start_date" class="text-xs text-gray-500 font-medium">Mulai</label>
                    <input type="text"
                      class="block w-full px-3 py-2.5 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                      id="start_date" name="start_date" readonly placeholder="DD-MM-YYYY">
                  </div>
                  <div class="space-y-1">
                    <label for="end_date" class="text-xs text-gray-500 font-medium">Selesai</label>
                    <input type="text"
                      class="block w-full px-3 py-2.5 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none"
                      id="end_date" name="end_date" readonly placeholder="DD-MM-YYYY">
                  </div>
                </div>
              </div>
            </div>

            <!-- Pesan -->
            <div class="space-y-2">
              <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest ml-1">Isi Pesan</label>
              <textarea name="message" id="message" rows="6"
                class="block w-full px-4 py-3 bg-siakad-bg/50 border border-gray-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-siakad-purple focus:border-siakad-purple transition-all outline-none resize-none"
                placeholder="Tuliskan isi pesan pengumuman disini..."></textarea>
            </div>
          </div>

          <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-50 mt-6">
            <button type="button"
              class="px-6 py-2.5 bg-gray-50 text-gray-500 font-bold rounded-xl hover:bg-gray-100 transition-all transform hover:-translate-y-0.5 active:translate-y-0"
              data-dismiss="modal">
              Batal
            </button>
            <button type="reset"
              class="px-6 py-2.5 bg-yellow-50 text-yellow-600 font-bold rounded-xl hover:bg-yellow-100 transition-all transform hover:-translate-y-0.5 active:translate-y-0">
              Reset
            </button>
            <button type="submit"
              class="px-8 py-2.5 bg-siakad-purple hover:bg-indigo-800 text-white font-bold rounded-xl shadow-lg shadow-indigo-100 transition-all transform hover:-translate-y-0.5 active:translate-y-0">
              Simpan Pesan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
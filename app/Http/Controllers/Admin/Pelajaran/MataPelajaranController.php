<?php

namespace App\Http\Controllers\Admin\Pelajaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Guru;
use App\Models\MataPelajaran;
use App\User;
class MataPelajaranController extends Controller
{

    public function index(Request $request)
    {
        if ($request->req == 'table') {

            return DataTables::of(MataPelajaran::
                join('pegawais', 'pegawais.id', 'pegawai_id')
                ->select('mata_pelajarans.*', 'pegawais.name as nama_guru')->get())
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" data-id="' . $data->id . '" class="btn-edit flex items-center px-3 py-1.5 bg-indigo-50 text-siakad-purple rounded-xl hover:bg-siakad-purple hover:text-white transition-all duration-200 font-bold text-xs"><i class="fas fa-pencil-alt mr-1.5"></i> Edit</button>';
                    $button .= '&nbsp;&nbsp;<button type="button" data-id="' . $data->id . '" class="btn-delete flex items-center px-3 py-1.5 bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all duration-200 font-bold text-xs"><i class="fas fa-trash mr-1.5"></i> Hapus</button>';
                    return '<div class="flex items-center space-x-2">' . $button . '</div>';
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        if ($request->req == 'single') {
            return response()->json(MataPelajaran::findOrFail($request->id));
        }

        $guru = Guru::all();
        //TODO: GURU BELUM FILTER BY SEKOLAH

        return view('admin.pelajaran.mata-pelajaran', array_merge(['mySekolah' => User::sekolah()], compact('guru')));
    }

    public function write(Request $request)
    {
        if ($request->req == 'write') {
            $obj = MataPelajaran::find($request->id);

            if (!$obj) {
                $obj = new MataPelajaran();
            }

            $obj->nama_pelajaran = $request->nama_pelajaran;
            $obj->kode_pelajaran = $request->kode_pelajaran;
            $obj->guru_id = $request->guru_id;
            $obj->aktif = $request->aktif == 'on';
            $obj->keterangan = $request->keterangan ?? '';
            $obj->sekolah_id = $request->user()->id_sekolah;
            $obj->save();
            return response()->json($obj);


        } elseif ($request->req == 'delete') {
            MataPelajaran::find($request->id)->delete();
        }
    }
}

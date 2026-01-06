<?php

namespace App\Http\Controllers\Admin\EVoting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Posisi;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PosisiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Posisi::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="' . $data->id . '" class="edit flex items-center px-3 py-1.5 bg-indigo-50 text-siakad-purple rounded-xl hover:bg-siakad-purple hover:text-white transition-all duration-200 font-bold text-xs"><i class="fas fa-edit mr-1.5"></i> Edit</button>';
                    $button .= '&nbsp;&nbsp;<button type="button" id="' . $data->id . '" class="delete flex items-center px-3 py-1.5 bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all duration-200 font-bold text-xs"><i class="fas fa-trash-alt mr-1.5"></i> Hapus</button>';
                    return '<div class="flex items-center space-x-2">' . $button . '</div>';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        $sekolahId = User::get('id_sekolah');
        return view('admin.e-voting.posisi', ['sekolah_id' => $sekolahId, 'mySekolah' => User::sekolah()]);
    }

    public function store(Request $request)
    {
        // validasi
        $rules = [
            'nama_posisi' => 'required|max:50',
        ];

        $message = [
            'nama_posisi.required' => 'Kolom ini tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        $status = Posisi::create([
            'name' => $request->input('nama_posisi'),
            'sekolah_id' => $request->input('sekolah_id')
        ]);

        return response()
            ->json([
                'success' => 'Data Added.',
            ]);
    }

    public function edit($id)
    {
        $nama_posisi = Posisi::find($id);

        return response()
            ->json([
                'nama_posisi' => $nama_posisi
            ]);
    }

    public function update(Request $request)
    {
        // validasi
        $rules = [
            'nama_posisi' => 'required|max:50',
        ];

        $message = [
            'nama_posisi.required' => 'Kolom ini tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        $status = Posisi::whereId($request->input('hidden_id'))->update([
            'name' => $request->input('nama_posisi'),
        ]);

        return response()
            ->json([
                'success' => 'Data Updated.',
            ]);
    }

    public function destroy($id)
    {
        $tingkat = Posisi::find($id);
        $tingkat->delete();
    }

}

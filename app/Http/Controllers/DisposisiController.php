<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisposisiController extends Controller
{

    public function index(){
        $data = array(
            'disposisi' => DB::table('disposisi')
            // ->join('pegawais', 'disposisi.nip', '=', 'pegawais.nip')
            // ->select('disposisi.*', 'pegawais.idbidang', 'pegawais.name', 'pegawais.pangkat', 'pegawais.jabatan', 'pegawais.foto')
            ->get(),
        );

        return view('disposisi.disposisi',$data);

    }

    public function submit(Request $request)
    {
    // Validasi input form sesuai kebutuhan
    $request->validate([
        'idsuratmasuk' => 'required|integer',
        // 'nip' => 'required|integer',
        'perihal' => 'required|string',
        'isi' => 'required|string',
        'tanggal' => 'required|date',
        'catatan' => 'required|string',
        'sifat' => 'required|string',
    ]);

    // Buat array data untuk dimasukkan ke dalam tabel 'disposisi'
    $data = [
        'idsuratmasuk' => $request->idsuratmasuk,
        // 'nip' => $request->nip,
        'perihal' => $request->perihal,
        'isi' => $request->isi,
        'tanggal' => $request->tanggal,
        // 'tujuandisposisi' => $request->tujuandisposisi,
        'catatan' => $request->catatan,
        'sifat' => $request->sifat,
        'created_at' => now(),
        'updated_at' => now(),
    ];

    // Insert data ke tabel 'disposisi'
    DB::table('disposisi')->insert($data);

    DB::table('suratmasuk')->where('idsuratmasuk', $request->idsuratmasuk)->update([
        'status' => 'Sudah Di Proses',
    ]);

    return redirect()->back()->with('success', 'Data disposisi berhasil ditambahkan.');
    }


}
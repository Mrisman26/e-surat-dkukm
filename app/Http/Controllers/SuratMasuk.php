<?php

namespace App\Http\Controllers;

use Flasher\Laravel\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SuratMasuk extends Controller
{
    public function index()
    {

        if (Auth::user()->level == 'SUPERADMIN' || Auth::user()->level == 'SEKERTARIAT') {
            $data = array (
                'suratmasuk'  => DB::table('suratmasuk')
                ->join('bidang', 'suratmasuk.idbidang', '=', 'bidang.idbidang')
                ->select('suratmasuk.*', 'bidang.namabidang')
                ->get(),
            );
        }else {
            $pegawai = DB::table('users')
            ->join('pegawais', 'users.email', '=', 'pegawais.email')
            ->select('pegawais.idbidang')
            ->where('pegawais.email', Auth::user()->email)
            ->first();
            // dd($pegawai);
        $data = array (
            'suratmasuk'  => DB::table('suratmasuk')
            ->join('bidang', 'suratmasuk.idbidang', '=', 'bidang.idbidang')
            ->select('suratmasuk.*', 'bidang.namabidang')
            ->where('suratmasuk.idbidang', $pegawai -> idbidang)
            ->get(),
        );
        }

        return view('surat-masuk.surat-masuk',$data);
    }

    public function formsuratmasuk()
    {
        return view('surat-masuk.form-surat-masuk',[
        ]);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'nosurat' => 'required|string',
            'tglsurat' => 'required|date',
            'tglditerima' => 'required|date',
            'perihal' => 'required|string',
            'pengirim' => 'required|string',
            'idbidang' => 'required|integer',
            'ringkasan' => 'required|string',
            'foto' => 'required|image|mimes:png,jpg,jpeg' // Max size 2MB
        ]);

        $foto = $request->file('foto');
        $originalName = $request->file('foto')->getClientOriginalName();
        $foto->storeAs('/public/users', $foto->hashName());

        // Sesuaikan dengan cara Anda mendapatkan ID user
        $iduser = auth()->user()->id;

        // if ($request->file('pdf')->isValid()) {
        //     $originalName = $request->file('pdf')->getClientOriginalName();
        //     $pdfPath = $request->file('pdf')->storeAs('pdfs', $originalName);

        // Insert data ke tabel suratmasuk menggunakan Query Builder
        $idsuratmasuk = DB::table('suratmasuk')->insertGetId([
            'iduser' => $iduser,
            'nosurat' => $request->nosurat,
            'tglsurat' => $request->tglsurat,
            'tglditerima' => $request->tglditerima,
            'perihal' => $request->perihal,
            'pengirim' => $request->pengirim,
            'idbidang' => $request->idbidang,
            'ringkasan' => $request->ringkasan,
            'foto' =>$foto->hashName(),

            // 'filename' => $pdfPath,
            'original_name' => $originalName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('Suratmasuk')->with('success', 'Data surat masuk berhasil ditambahkan. ID Surat Masuk: ' . $idsuratmasuk);
        //  return redirect('Datapegawai')->with('success','Data Berhasil Ditambahkan');

    return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupload file PDF.');
    }

    // public function submit(Request $request)
    // {
    //     $request->validate([
    //         'idbidang' => 'required',
    //         'tglsurat' => 'required|date',
    //         'tglditerima' => 'required|date',
    //         'perihal' => 'required|string',
    //         'pengirim' => 'required|string',
    //         'foto' => 'required|string',
    //         'ringkasan' => 'required|string',
    //     ]);

    //     // Ambil nomor surat terakhir dari database
    //     $lastSurat = DB::table('suratmasuk')
    //         ->where('idbidang', $request->idbidang)
    //         ->orderByDesc('idsuratmasuk')
    //         ->first();

    //     $newSuratNumber = $lastSurat ? ($lastSurat->nosurat + 1) : 1;

    //     // Format nomor surat dengan menambahkan prefix dan tahun
    //     $year = now()->format('Y');
    //     $newSuratNumberFormatted = "SURAT/{$request->idbidang}/{$newSuratNumber}/{$year}";

    //     // Simpan data surat masuk ke database
    //     $suratMasukId = DB::table('suratmasuk')->insertGetId([
    //         'iduser' => $request->iduser, // Sesuaikan dengan model dan metode autentikasi yang Anda gunakan
    //         'idbidang' => $request->idbidang,
    //         'nosurat' => $newSuratNumberFormatted,
    //         'tglsurat' => $request->tglsurat,
    //         'tglditerima' => $request->tglditerima,
    //         'perihal' => $request->perihal,
    //         'pengirim' => $request->pengirim,
    //         'foto' => $request->foto,
    //         'ringkasan' => $request->ringkasan,
    //         'status' => 'Sedang Di Proses',
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);

    //     return redirect('Suratmasuk')->with('success', 'Data surat masuk berhasil ditambahkan. ID Surat Masuk: ' . $suratMasukId);
    // }

    public function detail($idsuratmasuk)
    {

    $result = DB::table('suratmasuk')
        ->leftJoin('disposisi', 'suratmasuk.idsuratmasuk', '=', 'disposisi.idsuratmasuk')
        ->join('bidang', 'suratmasuk.idbidang', '=', 'bidang.idbidang')
        ->where('suratmasuk.idsuratmasuk',  $idsuratmasuk)
        ->select(
            'suratmasuk.*',
            'disposisi.id as id',
            'disposisi.perihal as perihal',
            'disposisi.isi as isi',
            'disposisi.tanggal as tanggal',
            'disposisi.catatan as catatan',
            'disposisi.sifat as sifat',
            'disposisi.created_at as disposisi_created_at',
            'disposisi.updated_at as disposisi_updated_at',
            'bidang.namabidang as namabidang'
        )
        ->first();

    // Return the view with the details
    return view('surat-masuk.detail-surat-masuk', ['result' => $result]);
    }
    public function deleteData($idsuratmasuk)
    {
        // Hapus data dari tabel suratmasuk menggunakan Query Builder
        DB::table('suratmasuk')->where('idsuratmasuk', $idsuratmasuk)->delete();

        return redirect('Suratmasuk')->with('success', 'Data surat masuk berhasil dihapus.');
    }

    // public function print()
    // {
    //     $items = DB::table('suratmasuk')
    //     ->join('bidang', 'suratmasuk.idbidang', '=', 'bidang.idbidang')
    //     ->select('suratmasuk.*', 'bidang.namabidang')
    //     ->get();

    // return view('surat-masuk.print-surat-masuk', [
    //     'items' => $items
    // ]);
    // }

    public function cetak()
    {
        return view('surat-masuk.form-pertanggal');
    }

    public function pertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
       $cetak = DB::table('suratmasuk')
       ->join('bidang', 'suratmasuk.idbidang', '=', 'bidang.idbidang')
       ->select('suratmasuk.*', 'bidang.namabidang')
       ->whereBetween('tglditerima', [$tglawal,$tglakhir])
       ->get();
       return view('surat-masuk.print-surat-masuk', [
        'cetak' => $cetak
    ]);

    }
}

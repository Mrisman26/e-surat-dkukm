<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratKeluar extends Controller
{
    public function index()
    {
        $data = array(
            'suratkeluar' => DB::table('suratkeluar')
            // ->join('')
            ->get(),
        );
        return view('surat-keluar.surat-keluar',$data);
    }

    public function formsuratkeluar()
    {
        return view('surat-keluar.form-surat-keluar',[
        ]);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'nosurat' => 'required|string',
            'tglsurat' => 'required|date',
            'tujuan' => 'required|string',
            'isisurat' => 'required|string',
            'perihal' => 'required|string',
            'foto' => 'required|image|mimes:png,jpg,jpeg' // Max size 2MB
        ]);

        $foto = $request->file('foto');
        $originalName = $request->file('foto')->getClientOriginalName();
        $foto->storeAs('/public/users', $foto->hashName());

        // Sesuaikan dengan cara Anda mendapatkan ID user
        // $iduser = auth()->user()->id;

        // if ($request->file('pdf')->isValid()) {
        //     $originalName = $request->file('pdf')->getClientOriginalName();
        //     $pdfPath = $request->file('pdf')->storeAs('pdfs', $originalName);

        // Insert data ke tabel suratmasuk menggunakan Query Builder
        $idsuratkeluar = DB::table('suratkeluar')->insertGetId([
            // 'idsuratkeluar' => $iduser,
            'tujuan' => $request->tujuan,
            'nosurat' => $request->nosurat,
            'isisurat' => $request->isisurat,
            'tglsurat' => $request->tglsurat,
            'perihal' => $request->perihal,
            'foto' =>$foto->hashName(),

            // 'filename' => $pdfPath,
            'original_name' => $originalName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('Suratkeluar')->with('success', 'Data surat keluar berhasil ditambahkan. ID Surat Keluar:' . $idsuratkeluar);
        //  return redirect('Datapegawai')->with('success','Data Berhasil Ditambahkan');

    return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupload file PDF.');
    }

//     public function submit(Request $request)
// {
//     $request->validate([
//         'tujuan' => 'required|string',
//         'nosurat' => 'required|string',
//         'isisurat' => 'required|string',
//         'tglsurat' => 'required|date',
//         'pdf' => 'required|mimes:pdf|max:2048', // Max size 2MB
//         'pirhal' => 'required|string',
//     ]);

//     // Upload file PDF ke penyimpanan (storage)
//     $pdfPath = $request->file('pdf')->store('pdfs');

//     // Insert data ke tabel suratkeluar menggunakan Query Builder
//     $idsuratkeluar = DB::table('suratkeluar')->insertGetId([
//         'tujuan' => $request->tujuan,
//         'nosurat' => $request->nosurat,
//         'isisurat' => $request->isisurat,
//         'tglsurat' => $request->tglsurat,
//         'filename' => $pdfPath,
//         'pirhal' => $request->pirhal,
//         'created_at' => now(),
//         'updated_at' => now(),
//     ]);

//     return redirect('Suratkeluar')->with('success', 'Data surat keluar dan file PDF berhasil ditambahkan. ID Surat Keluar: ' . $idsuratkeluar);
// }

function detail($id) {
    $detail = DB::table('suratkeluar')
        ->select('idsuratkeluar', 'tujuan', 'nosurat', 'isisurat', 'tglsurat', 'foto', 'perihal', 'original_name', 'created_at', 'updated_at')
        ->where('idsuratkeluar', $id)
        ->first();

        return view('surat-keluar.detail-surat-keluar', ['detail' => $detail]);
}

public function deleteData($idsuratkeluar)
{
    // Hapus data dari tabel suratmasuk menggunakan Query Builder
    DB::table('suratkeluar')->where('idsuratkeluar', $idsuratkeluar)->delete();

    return redirect('Suratkeluar')->with('success', 'Data surat keluar berhasil dihapus.');
}

// public function print()
// {
//     $items = DB::table('suratkeluar')
//         ->select('idsuratkeluar', 'tujuan', 'nosurat', 'isisurat', 'tglsurat', 'foto', 'perihal', 'created_at', 'original_name', 'updated_at')
//         ->orderBy('tglsurat', 'desc')
//         ->get();

//     return view('surat-keluar.print-surat-keluar', [
//         'items' => $items
//     ]);
// }

public function cetak()
{
    return view('surat-keluar.form-pertanggal');
}

public function pertanggal($tglawal, $tglakhir)
{
    // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
   $cetak = DB::table('suratkeluar')
   ->whereBetween('tglsurat', [$tglawal,$tglakhir])
   ->get();
   return view('surat-keluar.print-surat-keluar', [
    'cetak' => $cetak
]);

}

}
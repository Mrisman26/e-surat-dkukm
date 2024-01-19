<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function index()
    {
        $data = array(
            'data' => DB::table('files')
            // ->join('')
            ->get(),
        );
        return view('file',$data);
    }

    public function showForm()
    {
        return view('upload');
    }

    public function uploadPDF(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:2048', // Max size 2MB
        ]);

        if ($request->file('pdf')->isValid()) {
            $originalName = $request->file('pdf')->getClientOriginalName();
            $pdfPath = $request->file('pdf')->storeAs('pdfs', $originalName);

            // Simpan informasi file ke dalam database menggunakan Query Builder
            DB::table('files')->insert([
                'filename' => $pdfPath,
                'original_name' => $originalName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'File PDF berhasil diupload.');
        }

        return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupload file PDF.');
    }

    public function deletePDF($id)
    {
        // Ambil data file berdasarkan ID
        $file = DB::table('files')->find($id);

        // Hapus file dari storage
        Storage::delete($file->filename);

        // Hapus data file dari database
        DB::table('files')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'File PDF berhasil dihapus.');
    }
}
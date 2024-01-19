<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidangController extends Controller
{
    public function index()
    {
        // return view('admin.bidang.data-departemen',[
        // ]);

        $data = array(
            'namabidang' => DB::table('bidang')
            // ->join('')
            ->get(),
        );
        return view('admin.bidang.data-bidang',$data);
    }

    function submit(request $req)
    {

        $query  =DB::table('bidang')->insert([
            'namabidang'    => $req->namabidang,
        ]);

        if($query)
        {
            return redirect('Databidang')->with('success','Data Berhasil Ditambahkan');
        }

    }

    public function update(Request $request)
    {
        $idBidang = $request->input('idbidang');
    
        // Update 'bidang' table
        DB::table('bidang')
            ->where('idbidang', $idBidang)
            ->update([
                'namabidang' => $request->input('namabidang'),
                // Add other fields as needed
            ]);
    
        return redirect()->route('Databidang')->with('success', 'Data bidang berhasil diupdate');
    }

    public function delete($idbidang)
    {
        // Hapus data dari tabel suratmasuk menggunakan Query Builder
        DB::table('bidang')->where('idbidang', $idbidang)->delete();

        return redirect('Databidang')->with('success', 'Data Bidang berhasil dihapus.');
    }
}
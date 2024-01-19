<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengirimSurat extends Controller
{
    public function index()
    {
        return view('admin.pengirim.pengirim-surat',[
        ]);
    }
}
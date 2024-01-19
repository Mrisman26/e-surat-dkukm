<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NavbarController extends Controller
{
    public function index(){
        $data = array(
            'pegawai' => DB::table('pegawais')
            // ->join('')
            ->get(),
        );

        return view('template.navbar',$data);

    }
}
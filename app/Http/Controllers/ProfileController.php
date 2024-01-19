<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index($email){
        // $data = array(
        //     'pegawai' => DB::table('pegawais')
        //     // ->join('')
        //     ->get(),
        // );

        // return view('profile',$data);

        $userData = DB::table('users')->where('name', $email)->first();

        // Fetch pegawai data using query builder
        $pegawaiData = DB::table('pegawais')
        ->join('bidang', 'pegawais.idbidang', '=', 'bidang.idbidang')
        ->select('pegawais.*', 'bidang.namabidang')
        ->where('name', $email)->first();

        // Pass the data to the view
        return view('profile', [
            'user' => $userData,
            'pegawai' => $pegawaiData,
        ]);
        }

    }
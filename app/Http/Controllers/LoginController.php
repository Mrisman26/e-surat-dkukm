<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('Login.login',[
            'user'=> $user
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            pnotify()->addSuccess('Selamat Anda Berhasil Login');
            return redirect('Dashboard');
        }
        pnotify()->addError('Username dan Password Tidak Terdaftar');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        pnotify()->addError('Anda Telah Keluar Dari Sesi');
        return redirect('login');
    }

    public function beranda()
    {

        if (Auth::user()->level == 'PEGAWAI' || Auth::user()->level == 'ADMIN') {
        $pegawai = DB::table('users')
        ->join('pegawais', 'users.email', '=', 'pegawais.email')
        ->select('pegawais.idbidang')
        ->where('pegawais.email', Auth::user()->email)
        ->first();

        $masuk = DB::table('suratmasuk')
        ->where('idbidang', $pegawai -> idbidang)
        ->count();
        } else {
        $masuk = DB::table('suratmasuk')->count();
        }

        $keluar = DB::table('suratkeluar')->count();

        // return view('template.dashboard', compact('masuk', 'keluar'));
        return view('template.dashboard',[
            'masuk' => $masuk,
            'keluar' => $keluar
        ]);

    }

    public function register()
    {
        return view('Login.register');
    }

    public function register_proses(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6'
        ]);

        $data ['name']      = $request->name;
        $data ['email']     = $request->email;
        $data ['password']  = Hash::make($request->password);

        User::created($data);

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($login))
        {
            // $request->session()->regenerate();
            // pnotify()->addSuccess('Selamat Anda Berhasil Login');
            return redirect()->route('Dashboard');
        }
        // pnotify()->addError('Username dan Password Tidak Terdaftar');
        return back();
    }
}

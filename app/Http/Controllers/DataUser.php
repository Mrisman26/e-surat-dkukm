<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class DataUser extends Controller
{
   public function index(){
        $data = array(
            'pegawai' => DB::table('pegawais')
            ->join('bidang', 'pegawais.idbidang', '=', 'bidang.idbidang')
            ->select('pegawais.*', 'bidang.namabidang')
            ->get(),
        );

        return view('admin.pegawai.data-user',$data);

    }

    function form()
    {
        $data   = [
            'judul'     => 'Tambah Data Jurusan',
            'aksi'      => url('submit')
        ];
        return view('admin.pegawai.form', $data);
    }

    function submit(request $req)
    {
        $this->validate($req,[
            'foto'=> 'required|image|mimes:png,jpg,jpeg'
        ]);

        $foto = $req->file('foto');
        $foto->storeAs('/public/users', $foto->hashName());

        $query  =DB::table('pegawais')->insert([
            'name'    => $req->name,
            'pangkat'    => $req->pangkat,
            'email' => $req->email,
            'jabatan' => $req->jabatan,
            'idbidang' => $req->idbidang,
            'foto' =>$foto->hashName()
        ]);

        $query  =DB::table('users')->insert([
            'name'    => $req->name,
            'level' => $req->level,
            'email' => $req->email,
            'password' => bcrypt('12345678'),
        ]);

        if($query)
        {
            return redirect('Datapegawai')->with('success','Data Berhasil Ditambahkan');
        }

    }


    public function edit($email)
    {
    // Fetch user data using query builder
    $userData = DB::table('users')->where('email', $email)->first();

    // Fetch pegawai data using query builder
    $pegawaiData = DB::table('pegawais')->where('email', $email)->first();

    // Pass the data to the view
    return view('admin.pegawai.edit', [
        'userData' => $userData,
        'pegawaiData' => $pegawaiData,
    ]);
    }

    // public function update(Request $request)
    // {

    //     $email = $request->input('email');

    //     // dd($request->all()); // Check the request data

    //     // Update 'users' table
    //     DB::table('users')
    //         ->where('email', $email)
    //         ->update([
    //             'name' => $request->input('name'),
    //             'password' => bcrypt($request->input('password')),
    //             // Add other fields as needed
    //         ]);

    //     // Update 'pegawais' table
    //     DB::table('pegawais')
    //         ->where('email', $email)
    //         ->update([
    //             'name' => $request->input('name'),
    //             'pangkat' => $request->input('pangkat'),
    //             'jabatan' => $request->input('jabatan'),
    //             // Add other fields as needed
    //         ]);

    //         return redirect()->route('Datapegawai')->with('success', 'Data Berhasil Di Edit');

    //         // dd('Pegawai data updated');
    // }

    public function update(Request $request, $email)
    {
        $email = $request->email;
        $old_foto       = $request->old_foto;
        if($request->hasFile('foto')){
            $foto       = $email.".".$request->file('foto')->getClientOriginalExtension();
        } else{
            $foto       = $old_foto;
        }

        // try {
        // $data = [
        //     'name' => $name,
        //     'pangkat'=> $pangkat,
        //     'email'=> $email,
        //     'jabatan'=> $jabatan,
        //     'level' => $level,
        //     'foto' => $foto
        // ];

        // $update     = DB::table('pegawais')->where('email', $email)->update($data);
        //     if($update){
        //         if($request->hasFile('foto')){
        //             $folderPath = "public/users";
        //             $folderPathOld = "public/users/".$old_foto;
        //             Storage::delete($folderPathOld);
        //             $request->file('foto')->storeAs($folderPath, $foto);
        //         }

        //         DB::table('users')
        //             ->where('email', $email)
        //             ->update([
        //                 'name' => $request->input('name'),
        //                 'password' => bcrypt($request->input('password')),
        //                 'level' => $request->input('level'),
        //                 'email' => $request->input('email'),
        //                 // Add other fields as needed
        //         ]);

        //         return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
        //     }
        // } catch (\Exception $e){
        //     return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        // }

        // Update 'users' table
        DB::table('users')
            ->where('email', $email)
            ->update([
                'name' => $request->input('name'),
                'password' => bcrypt($request->input('password')),
                'level' => $request->input('level'),
                'email' => $request->input('email'),
                // Add other fields as needed
            ]);

        // Update 'pegawais' table
        DB::table('pegawais')
            ->where('email', $email)
            ->update([
                'name' => $request->input('name'),
                'pangkat' => $request->input('pangkat'),
                'jabatan' => $request->input('jabatan'),
                'email' => $request->input('email'),
                'foto' => $foto,
                // Add other fields as needed
            ]);

        return redirect()->route('Datapegawai')->with('success', 'Data Berhasil Di Edit');
    }

    function delete($email){

    $users = DB::table('users')->where('email', $email)->delete();

    // Delete pegawai data and file
    $pegawai = DB::table('pegawais')->where('email', $email)->first();
    if ($users) {
        // Delete file
        // $fotoPath = '/public/users/' . $pegawai->foto;
        // if (file_exists($fotoPath)) {
        //     unlink($fotoPath);
        // }

        // Delete pegawai data
       $hapus = DB::table('pegawais')->where('email', $email)->delete();
       if ($hapus) {
         $fotoPath = '/public/users/' . $pegawai->foto;
        Storage::delete($fotoPath);
       }
    }

    return redirect()->route('Datapegawai');

    }

    public function updatePassword(Request $request)
{
    $request->validate([
        'password' => 'required',
        'newpassword' => 'required|min:8',
        'renewpassword' => 'required|same:newpassword',
    ]);

    $user = auth()->user(); // Assuming the user is authenticated

    // Retrieve the user's current password hash from the database
    $currentPasswordHash = DB::table('users')
        ->where('id', $user->id)
        ->value('password');

    // Verify if the provided current password matches the stored hash
    if (!password_verify($request->password, $currentPasswordHash)) {
        return redirect()->back()->with('error', 'Current password is incorrect.');
    }

    // Update the user's password with the new hashed password
    $newPasswordHash = password_hash($request->newpassword, PASSWORD_BCRYPT);

    DB::table('users')
        ->where('id', $user->id)
        ->update(['password' => $newPasswordHash]);

    return redirect()->back()->with('success', 'Password updated successfully.');
}

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\User;
use Auth;

class MyAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('admin/profile.index');
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {
        $request -> validate([
            'nama' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'email' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_telepon' => 'required'
        ]);
        $user = User::findOrFail($id_user);
        if($request->hasFile('gambar')){
            if(Auth::user()->admin==1){
                $namaProfil = 'admin';
            }
            else if(Auth::user()->admin==2){
                $namaProfil = 'user';
            }
            else{
                $namaProfil = 'panitia';
            }
            $oldPicture = Auth::user()->gambar;
            $old_path = ("img/profile/{$namaProfil}/$oldPicture");
            if(File::exists($old_path)){
                File::delete($old_path);
            }
            $image = $request->file('gambar'); 
            $new_image = $image->getClientOriginalName();
            $image->move(public_path("img/profile/{$namaProfil}"), $new_image);
            
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->tanggal_lahir = $request->tanggal_lahir; 
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->nomor_telepon = $request->nomor_telepon;
        $user->gambar = $new_image;
        $user->save();
        return redirect('/account')->with('success','Data berhasil diedit');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

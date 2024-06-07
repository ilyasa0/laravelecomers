<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toko=Toko::all();
        $user=User::all();
        return view('toko.index',compact('toko','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $input = $request->all();
       $validasi = Validator::make($input,[
        'nama_toko' => 'required | max:128| string | min:5' ,
        'desc_toko' => 'required',
        'kategori_toko'=> 'required',
        'hari_buka'=> 'required',
        'jam_buka'=> 'required ',
        'jam_libur'=> 'required ',
        'icon_toko'=> 'required | mimes:jpg,jpeg,png,svg ',
    ]);
    if($validasi->fails()){
        return back()->withErrors($validasi)->withInput();
    }

    // input hari

    $input['hari_buka'] = json_encode($request->hari_buka);

    // gambar
    if($request->hasFile('icon_toko')){
        $folder = 'public/images/toko'; // membuat folger penyimpanan
        $gambar = $request->file('icon_toko'); //mebgambil data dari request
        $nama_gambar = $gambar->getClientOriginalName(); // memberikan nama pada file yang di upload
        $path = $request->file('icon_toko')->storeAs($folder,$nama_gambar); // mengirimkan gambar ke folder
        $input['icon_toko']=$nama_gambar;//memberikan nama yang dikirim ke data base
    };

    $hari = implode(',',$request->input('hari_buka'));
    $input['hari_buka']=$hari;

   Toko::create($input);
    return back();


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data=Toko::find($id);
        return view('toko.detail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Toko $toko)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Toko $toko, string $id)
    {
        $toko = Toko::find($id);
        $input = $request->all();
     
        $validasi = Validator::make($input,[
            'nama_toko' => 'required | max:128| string | min:5' ,
            'desc_toko' => 'required',
            'kategori_toko'=> 'required',
            'hari_buka'=> 'required',
            'jam_buka'=> 'required ',
            'jam_libur'=> 'required ',
            'icon_toko'=> 'required | mimes:jpg,jpeg,png,svg ',
        ]);
        if($validasi->fails()){
            return back()->withErrors($validasi)->withInput();
        }

        $hari = implode(',',$request->input('hari_buka'));
        $input['hari_buka']=$hari;

        $toko->update($input);
        return redirect('/toko');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Toko $toko,string $id)
    {
        $data = Toko::find($id);
       $data->delete();
       return back();
    }
}

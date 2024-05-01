<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\DaftarTamu;
use App\Models\Bagian;
use App\Models\Pegawai;
use Storage;

use Illuminate\Http\RedirectResponse;

class Tamu_controller extends Controller
{
    public function index(): View
    {
        $DaftarTamus = DaftarTamu::orderBy('id', 'ASC')->paginate(10);
        return view('index_DaftarTamu', compact('DaftarTamus'));
    }
    public function create(): View
    {
        $Bagians = Bagian::orderBy('nama_bagian', 'ASC')->get();
        $Pegawais = Pegawai::orderBy('nama', 'ASC')->get();

        return view('DaftarTamu_create',compact('Bagians','Pegawais'));
    }
public function store(Request $request): RedirectResponse
{
    $this->validate($request, [
        'nama'      =>'required|min:1',
        'alamat'      =>'required|min:1',
        'no_wa'      =>'required|min:1',
        'keperluan'      =>'required|min:1',
        'tujuan'      =>'required|min:1',
        'jk'      =>'required|min:1'
    ]);
    if ($request->foto){
        $img = $request->foto;
        $folderPath = "public/foto/";
        
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        
        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);
    }else{
        $fileName='default.jpg';
    }
    if ($request->hasFile('lampiran')) {

        //upload new image
        $lampiran = $request->file('lampiran');
        $lampiran->storeAs('public/lampiran', $lampiran->hashName());
        $file_lampiran = $lampiran->hashName();
    }else{
        $file_lampiran='-';
    }   

    DaftarTamu::Create([
        'nama'=> $request->nama,
        'alamat' => $request->alamat,
        'no_wa' => $request->no_wa,
        'jk' => $request->jk,
        'tujuan' => $request->tujuan,
        'keperluan' => $request->keperluan,
        'pegawai' => $request->pegawai,
        'foto' => $fileName,
        'lampiran' => $file_lampiran,
    ]);
    return redirect()->route('tamu.index')->with(['success'=>'Data Berhasil Disimpan!']);
}
// public function edit(string $id): View
//     {
//       }
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_DaftarTamu'     => 'required|min:1',
            'status'     => 'required|min:1',
        ]);
        $DaftarTamus=DaftarTamu::findOrFail($id);
        $DaftarTamus->update([
            'nama_DaftarTamu'     => $request->nama_DaftarTamu,
            'status'     => $request->status  
        ]);
        return redirect()->route('DaftarTamu.index');

    }
    public function destroy($id): RedirectResponse
    {
        $DaftarTamus = DaftarTamu::findOrFail($id);
        $DaftarTamus->delete();
        return redirect()->route('tamu.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\DaftarTamu;
use App\Models\Bagian;
use App\Models\Pegawai;

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
        'nama_DaftarTamu'      =>'required|min:1'
    ]);
    if ($request->hasFile('foto')){
        $img = $request->foto;
        $folderPath = "uploads/";
        
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        
        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);
    }else{
        $filename='default.jpg';
    }
        

    DaftarTamu::Create([
        'nama_DaftarTamu'=> $request->nama_DaftarTamu,
        'status' => 'aktif'
    ]);
    return redirect()->route('DaftarTamu.index')->with(['success'=>'Data Berhasil Disimpan!']);
}
public function edit(string $id): View
    {
        //get post by ID
        $DaftarTamus = DaftarTamu::findOrFail($id);

        //render view with post
        return view('edit_DaftarTamu', compact('DaftarTamus'));
    }
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
        return redirect()->route('DaftarTamu.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pegawai;
use Illuminate\Http\RedirectResponse;

class Controller_pegawai extends Controller
{
    public function index(): View
    {
        $Pegawais = Pegawai::orderBy('id', 'ASC')->paginate(10);
        return view('index_pegawai', compact('Pegawais'));
    }
    public function create(): View
{
    return view('pegawai_create');
}
public function store(Request $request)
{
    $this->validate($request, [
        'nip'      =>'required|min:1',
        'nama'      =>'required|min:1',
        'jabatan'      =>'required|min:1',
        'bagian'      =>'required|min:1',
        'no_hp'      =>'required|min:1'
    ]);
    Pegawai::Create([
        'nip'=> $request->nip,
        'nama'=> $request->nama,
        'jabatan'=> $request->jabatan,
        'bagian'=> $request->bagian,
        'no_hp'=> $request->no_hp,
        'status' => 'aktif'
    ]);
    return redirect()->route('pegawai.index');

}
public function edit(string $id): View
    {
        //get post by ID
        $Pegawais = Pegawai::findOrFail($id);

        //render view with post
        return view('edit_pegawai', compact('Pegawais'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nip'      =>'required|min:1',
            'nama'      =>'required|min:1',
            'jabatan'      =>'required|min:1',
            'bagian'      =>'required|min:1',
            'no hp'      =>'required|min:1',
            'status'      =>'required|min:1'
    
        ]);
        $Pegawais=Pegawai::findOrFail($id);
        $Pegawais->update([
            'nip'     => $request->nip,
            'nama'     => $request->nama_pegawai,  
            'jabatan'     => $request->jabatan , 
            'bagian'     => $request->bagian  ,
            'no_hp'     => $request->no_hp  ,
            'status'     => $request->status  
        ]);
        return redirect()->route('pegawai.index');

    }
    public function destroy($id): RedirectResponse
    {
        $Pegawais = Pegawai::findOrFail($id);
        $Pegawais->delete();
        return redirect()->route('pegawai.index');
    }
}


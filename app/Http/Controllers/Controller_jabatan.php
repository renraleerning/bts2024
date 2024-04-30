<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Jabatan;
use Illuminate\Http\RedirectResponse;

class Controller_jabatan extends Controller
{
    public function index(): View
    {
        $Jabatans = Jabatan::orderBy('id', 'ASC')->paginate(10);
        return view('index_jabatan', compact('Jabatans'));
    }
    public function create(): View
{
    return view('jabatan_create');
}
public function store(Request $request): RedirectResponse
{
    $this->validate($request, [
        'nama_jabatan'      =>'required|min:1'
    ]);

    Jabatan::Create([
        'nama_jabatan'=> $request->nama_jabatan,
        'status' => 'aktif'
    ]);
    return redirect()->route('jabatan.index')->with(['success'=>'Data Berhasil Disimpan!']);
}
public function edit(string $id): View
    {
        //get post by ID
        $Jabatans = Jabatan::findOrFail($id);

        //render view with post
        return view('edit_jabatan', compact('Jabatans'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_jabatan'     => 'required|min:1',
            'status'     => 'required|min:1',
        ]);
        $Jabatans=Jabatan::findOrFail($id);
        $Jabatans->update([
            'nama_jabatan'     => $request->nama_jabatan,
            'status'     => $request->status  
        ]);
        return redirect()->route('jabatan.index');

    }
    public function destroy($id): RedirectResponse
    {
        $Jabatans = Jabatan::findOrFail($id);
        $Jabatans->delete();
        return redirect()->route('jabatan.index');
    }
}


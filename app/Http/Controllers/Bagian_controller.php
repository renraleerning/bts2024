<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bagian;
use Illuminate\Http\RedirectResponse;

class Bagian_controller extends Controller
{
    public function index(): View
    {
        $Bagians = Bagian::orderBy('id', 'ASC')->paginate(10);
        return view('index_bagian', compact('Bagians'));
    }
    public function create(): View
{
    return view('bagian_create');
}
public function store(Request $request): RedirectResponse
{
    $this->validate($request, [
        'nama_bagian'      =>'required|min:1'
    ]);

    Bagian::Create([
        'nama_bagian'=> $request->nama_bagian,
        'status' => 'aktif'
    ]);
    return redirect()->route('bagian.index')->with(['success'=>'Data Berhasil Disimpan!']);
}
public function edit(string $id): View
    {
        //get post by ID
        $Bagians = Bagian::findOrFail($id);

        //render view with post
        return view('edit_bagian', compact('Bagians'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_bagian'     => 'required|min:1',
            'status'     => 'required|min:1',
        ]);
        $Bagians=Bagian::findOrFail($id);
        $Bagians->update([
            'nama_bagian'     => $request->nama_bagian,
            'status'     => $request->status  
        ]);
        return redirect()->route('bagian.index');

    }
    public function destroy($id): RedirectResponse
    {
        $Bagians = Bagian::findOrFail($id);
        $Bagians->delete();
        return redirect()->route('bagian.index');
    }
}

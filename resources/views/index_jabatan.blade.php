@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h1>Jabatan</h1>
    <a class="btn btn-success"href="{{route('jabatan.create')}}"> Tambah Jabatan</a>
    <table class="table">
  <thead class="table-light">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Jabatan</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
   @forelse ($Jabatans as $jabatan) 
    <tr>
      <th scope="row">{{$jabatan->id}}</th>    
      <td>{{$jabatan->nama_jabatan}}</td>
      <td>{{$jabatan->status}}</td>
      <td>
      <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jabatan.destroy', $jabatan->id) }}" method="POST">
      <a href="{{ route('jabatan.edit', $jabatan->id) }}" class="btn btn-sm btn-primary">EDIT</a>
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
      </form>       
    </td>
    </tr>
    @empty
    <tr>
    <td  colspan="4">
    <div class="alert alert-danger">Data belum Tersedia.</div>    
    </td> 
    </tr>
    @endforelse 
   
  </tbody>
</table>
</div>
@endsection

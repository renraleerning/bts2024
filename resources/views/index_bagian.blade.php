@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h1>Bagian</h1>
    <a class="btn btn-success"href="{{route('bagian.create')}}"> Tambah bagian/Depart</a>
    <table class="table">
  <thead class="table-light">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Bagian/Depart</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
   @forelse ($Bagians as $bagian) 
    <tr>
      <th scope="row">{{$bagian->id}}</th>    
      <td>{{$bagian->nama_bagian}}</td>
      <td>{{$bagian->status}}</td>
      <td>
      <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('bagian.destroy', $bagian->id) }}" method="POST">
      <a href="{{ route('bagian.edit', $bagian->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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

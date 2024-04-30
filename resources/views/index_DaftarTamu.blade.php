@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h1>Daftar Tamu</h1>
    <a class="btn btn-success fa-solid fa-plus" href="{{route('tamu.create')}}"> Tambah Tamu</a>
    <table class="table">
  <thead class="table-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Foto</th>
      <th scope="col">Identitas</th>
      <th scope="col">Keperluan</th>
      <th scope="col">Tujuan Ke</th>
      <th scope="col">Lampiran</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
   @forelse ($DaftarTamus as $tamu) 
    <tr>
      <th scope="row">{{$tamu->id}}</th>    
      <td><img src="{{ asset('/storage/tamu/'.$tamu->image) }}" class="rounded" style="width: 150px"></td>
      <td>
        <b>{{$tamu->nama}}</b>
        <p>({{$tamu->jk}})</p>
        <p>{{$tamu->alamat}}</p>
        <p>No WA : <b>{{$tamu->no_wa}}</b></p>
      </td>
      <td>{{$tamu->keperluan}}</td>
      <td>{{$tamu->tujuan}}</td>
      <td>-
      <!-- {{ asset('/storage/lampiran/'.$tamu->lampiran) }} -->
      </td>
      <td>
      <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pegawai.destroy', $tamu->id) }}" method="POST">
      <a href="{{ route('pegawai.edit', $tamu->id) }}" class="btn btn-sm btn-primary">EDIT</a>
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
      </form>       
    </td>
    </tr>
    @empty
    <tr>
    <td  colspan="7">
    <div class="alert alert-danger">Data belum Tersedia.</div>    
    </td> 
    </tr>
    @endforelse 
   
  </tbody>
</table>
</div>
@endsection

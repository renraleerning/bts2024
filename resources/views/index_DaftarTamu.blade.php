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
      <th scope="col">Tujuan & Waktu</th>
      <th scope="col">Lampiran</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
   @forelse ($DaftarTamus as $tamu) 
    <tr>
      <th scope="row">{{$tamu->id}}</th>    
      <td>
      <?php
        if(strcmp($tamu->foto,'default.svg')==0){
          ?>
          <img src="{{URL::asset('images/asset/profile.svg'); }}" class="rounded" style="width: 140px; height:100px">
          <?php
        }else{
          ?>
          <img src="{{ asset('/storage/foto/'.$tamu->foto) }}" class="rounded" style="width: 140px; height:100px">
          <?php
        }
      ?>
      </td>
      <td>
        <b>{{$tamu->nama}}</b>
        <p>({{$tamu->jk}})<br>{{$tamu->alamat}}<br>No WA : <b>{{$tamu->no_wa}}</b></p>
      </td>
      <td>{{$tamu->keperluan}}</td>
      <td>{{$tamu->tujuan}}
      <table>
        <!-- <tr>
          <td>Pegawai</td>
          <td>: <b>{{$tamu->pegawai}}</b></td>
        </tr> -->
        <tr>
          <td>Tanggal</td>
          <td>: <b>{{$tamu->created_at->format('d-m-Y')}}</b></td>
        </tr>
        <tr>
          <td>Waktu</td>
          <td>: <b>{{$tamu->created_at->format('h:i')}}</b></td>
        </tr>
      </table>  
     </td>
      <td>
        <?php
        if($tamu->lampiran!='-'){
          ?>
          <a href="{{ asset('/storage/lampiran/'.$tamu->lampiran) }}">unduh</a>
          <?php
        }
        ?>
      </td>
      <td>
      <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('tamu.destroy', $tamu->id) }}" method="POST">
      <!-- <a href="{{ route('pegawai.edit', $tamu->id) }}" class="btn btn-sm btn-primary">EDIT</a> -->
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

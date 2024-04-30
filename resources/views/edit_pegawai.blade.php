@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h1>Pegawai</h1>
    <form action ="{{route('pegawai.update',$Pegawais->id)}}" method="post">
        @csrf
        @method('PUT')
<div class="mb-3">
    <label for="nip" class="form-label"> NIP</label>
    <input type="text" class="form-control" id="nip" name="nip" value="{{old('nip',$Pegawais->nip)}}">
</div>
    <label for="nama" class="form-label"> Nama Pegawai</label>
    <input type="text" class="form-control" id="nama" name="nama_pegawai" value="{{old('nama_pegawai',$Pegawais->nama_pegawai)}}">
</div>
<div class="mb-3">
    <label for="jabatan" class="form-label"> Jabatan</label>
    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{old('jabatan',$Pegawais->jabatan)}}">
</div>
<div class="mb-3">
    <label for="bagian" class="form-label"> Bagian</label>
    <input type="text" class="form-control" id="bagian" name="bagian" value="{{old('bagian',$Pegawais->bagian)}}">
</div>
<div class="mb-3">
    <label for="no_hp" class="form-label"> No HP</label>
    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{old('no_hp',$Pegawais->no_hp)}}">
</div>
<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status">
        <option value="aktif">aktif</option>
        <option value="tidak aktif">tidak aktif</option>
</div>
<div class="mb-3">
<input type="submit" value="submit" class="form-control btn btn-success" name="submit">

</form>
</div>
@endsection

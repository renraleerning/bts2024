@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h1>Pegawai</h1>
    <form action ="{{route('pegawai.store')}}" method="post">
        @csrf
    <div class="mb-3">
        <label for="nip" class="form-label">NIP</label>
        <input type="text" class="form-control" id="nip" name="nip">
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">NAMA</label>
        <input type="text" class="form-control" id="nama" name="nama">
    </div>
    <div class="mb-3">
        <label for="jabatan" class="form-label">Jabatan</label>
        <input type="text" class="form-control" id="jabatan" name="jabatan">
    </div>
    <div class="mb-3">
        <label for="bagian" class="form-label">Bagian</label>
        <input type="text" class="form-control" id="bagian" name="bagian">
    </div>
    <div class="mb-3">
        <label for="no_hp" class="form-label">No HP</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control" id="status" name="status">
    </div>
<div class="mb-3">
<input type="submit" value="submit" class="form-control btn btn-success" name="submit">
</div>
</form>
</div>
@endsection

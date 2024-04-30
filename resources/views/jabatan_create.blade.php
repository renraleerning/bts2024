@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h1>Jabatan</h1>
    <form action ="{{route('jabatan.store')}}" method="post">
        @csrf
<div class="mb-3">
    <label for="nama" class="form-label"> Nama Jabatan</label>
    <input type="text" class="form-control" id="nama" name="nama_jabatan">
</div>
<div class="mb-3">
<input type="submit" value="submit" class="form-control btn btn-success" name="submit">

</form>
</div>
@endsection

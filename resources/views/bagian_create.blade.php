@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h1>Bagian</h1>
    <form action ="{{route('bagian.store')}}" method="post">
        @csrf
<div class="mb-3">
    <label for="nama" class="form-label"> Nama Bagian</label>
    <input type="text" class="form-control" id="nama" name="nama_bagian">
</div>
<div class="mb-3">
<input type="submit" value="submit" class="form-control btn btn-success" name="submit">

</form>
</div>
@endsection

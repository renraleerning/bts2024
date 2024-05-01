@extends('layouts.sidebar')
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@section('content')
<div class="container">
    <h1>Tambah Tamu</h1>
    <form action ="{{route('tamu.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea type="text" class="form-control" id="alamat" name="alamat"></textarea>
    </div>
    <div class="mb-3">
        <label for="no_wa" class="form-label">Nomor Whatsapp</label>
        <input type="text" class="form-control" id="no_wa" name="no_wa">
    </div>

    <div class="mb-3">
        <label for="jk" class="form-label">Jenis Kelamin</label>
        <select name="jk" id="jk" class="form-select">
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
    </div>

    <div class="mb-3">
        <label for="no_hp" class="form-label">Tempat Tujuan</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp">
    </div>
    <div class="mb-3">
        <label for="pegawai" class="form-label">Pegawai Yang Dituju</label>
        <!-- <input type="text" class="form-control" id="pegawai" name="pegawai"> -->
        <select name="pegawai" id="pegawai" class="form-select">
        @forelse($Pegawais as $pegawai)
        <option value="{{$pegawai->nama}}">{{$pegawai->nama}}</option>
        @empty
        <option value="Data tidak ada">Data tidak ada</option>
        @endforelse
        </select>
    </div>
    <div class="mb-3">
    <label for="keperluan" class="form-label">Keperluan Bertamu</label>
        <textarea type="text" class="form-control" id="keperluan" name="keperluan"></textarea>
    </div>
    <div class="mb-3">
    <label for="lampiran" class="form-label">Lampiran</label>
    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="lampiran">
    @error('image')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    </div>
    <div class="mb-3">
    <label for="keperluan" class="form-label">Foto</label>
    <div class="container text-center">
  <div class="row">
    <table>
        <tr>
            <td>
                <div id="my_camera"></div>
                    <br/>
                    <input type=button value="Ambil Foto" onClick="take_snapshot()">
                    <input type="hidden" name="foto" class="image-tag">
                </div>
            </td>
            <td>
                <p>Tampilan Foto : </p>
                <div id="results" >Your captured image will appear here...</div>
            </td>
        </tr>
    </table>
    </div>
    <div class="mb-3">
        <input type="submit" value="submit" class="form-control btn btn-success" name="submit">
    </div>
</form>
</div>
<script language="JavaScript">
    Webcam.set({
        width: 300,
        height: 300,
        image_format: 'jpeg',
        jpeg_quality: 90
    });   
    Webcam.attach('#my_camera'); 
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img width="300px" height="250px" src="'+data_uri+'"/>';
        } );
    }
</script>
@endsection

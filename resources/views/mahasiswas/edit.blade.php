@extends('mahasiswas.layout')
 
@section('content')
 
<div class="container mt-5">
    
    <div class="row justify-content-center align-items-center">
    <div class="card" style="width: 24rem;">
    <div class="card-header">
    Edit Mahasiswa
    </div>
    <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your i
    nput.<br><br>
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif
    <form method="post" action="{{ route('mahasiswas.update', $Mahasiswa->nim) }}" enctype="multipart/form-data" id="myForm">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="nim">Nim</label> 
    <input type="text" name="nim" class="form-control" id="nim" value="{{ $Mahasiswa->nim }}" ariadescribedby="nim"> 
    </div>
    <div class="form-group">
    <label for="nama">Nama</label> 
    <input type="text" name="nama" class="form-control" id="nama" value="{{ $Mahasiswa->nama }}" ariadescribedby="nama"> 
    </div>
    <div class="form-group">
        <label for="foto">Foto</label> 
            <div class="d-flex align-items-center">
                <img width="100px" class="rounded mx-auto d-block" src="{{ $Mahasiswa->foto==''? asset('images/default.png'): asset('storage/'.$Mahasiswa->foto) }}" alt="">
                <input class="form-control" style="margin-left: 5px" type="file" id="foto" name="foto">
                
            </div>
        </div>
    <div class="form-group">
    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label> 
        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ $Mahasiswa->tanggal_lahir }}" ariadescribedby="nama"> 
        </div>
    <div class="form-group">
    <label for="kelas">Kelas</label> 
    {{-- <input type="kelas" name="kelas" class="form-control" id="kelas" value="{{ $Mahasiswa->kelas }}" ariadescribedby="kelas">  --}}
    <select name="kelas" class="form-control">
        @foreach($kelas as $Kelas)
        <option value="{{$Kelas->id}}">{{$Kelas->nama_kelas}}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
    <label for="jurusan">Jurusan</label> 
    <input type="jurusan" name="jurusan" class="form-control" id="jurusan" value="{{ $Mahasiswa->jurusan }}" ariadescribedby="jurusan"> 
    </div>
    <div class="form-group">
    <label for="no_handphone">No_handphone</label> 
    <input type="no_handphone" name="no_handphone" class="form-control" id="no_Handphone" value="{{ $Mahasiswa->no_handphone }}" ariadescribedby="no_handphone" > 
    </div>
    <div class="form-group">
        <label for="email">Email</label> 
        <input type="email" name="email" class="form-control" id="email" value="{{ $Mahasiswa->email }}" ariadescribedby="no_handphone" > 
        </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>
    </div>
</div>
@endsection
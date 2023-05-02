@extends('mahasiswas.layout')
    @section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            <div class="row mt-5 d-flex justify-content-beetwen">
                <form method="get" action="{{ route('mahasiswas.index') }}" class="col-7 d-flex justify-content-start">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control me-2" type="text" placeholder="search" aria-label="search" 
                        value="{{ request('search') }}">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div> 
                </form>
                <div class="col-5 d-flex justify-content-end">
                    <div class="float-right mb-3">
                        <a class="btn btnsuccess" href="{{ route('mahasiswas.create') }}"> Input Mahasiswa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
    @endif
    
    <table class="table table-bordered">
    <tr>
    <th>Nim</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Jurusan</th>
    {{-- <th>No_Handphone</th> --}}
    <th width="280px">Action</th>
    </tr>
    @foreach ($mahasiswas as $Mahasiswa)
    <tr>
    
    <td>{{ $Mahasiswa->nim }}</td>
    <td>{{ $Mahasiswa->nama }}</td>
    <td>{{ $Mahasiswa->kelas->nama_kelas }}</td>
    <td>{{ $Mahasiswa->jurusan }}</td>
    {{-- <td>{{ $Mahasiswa->no_handphone }}</td> --}}
    <td>
    <form action="{{ route('mahasiswas.destroy',$Mahasiswa->nim) }}" method="POST">
    
    <a class="btn btn-info" href="{{ route('mahasiswas.show',$Mahasiswa->nim) }}">Show</a>
    <a class="btn btn-primary" href="{{ route('mahasiswas.edit',$Mahasiswa->nim) }}">Edit</a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </td>
    </tr>
    
    @endforeach
    </table>

    <div>
        {!! $mahasiswas->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
    
@endsection
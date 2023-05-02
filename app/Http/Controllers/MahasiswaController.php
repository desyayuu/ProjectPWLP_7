<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $user = Auth::user();
        // $mahasiswas = Mahasiswa::paginate(5);
        // return view('mahasiswas.index', compact('mahasiswas', 'user'))
        // ->with('i', (request()->input('page', 1) -1)*5);

        if ($request->has('search')) {
            $mahasiswas = Mahasiswa::where('nama', 'LIKE', '%' . request('search') . '%') ->paginate(5);
            return view('mahasiswas.index', ['mahasiswas' => $mahasiswas]);
        }else{
        //fungsi eloquent menampilkan data menggunakan pagination
        //$mahasiswas = Mahasiswa::all();//ambil all data
        $mahasiswas = Mahasiswa::orderBy('nim', 'desc')->paginate(5);
        return view('mahasiswas.index', compact('mahasiswas'))
        ->with('i', (request()->input('page', 1)-1)*5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswas.create', ['kelas'=>$kelas]);
        // return view('mahasiswas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nim'=> 'required',
            'nama'=> 'required', 
            'tanggal_lahir'=> 'required',
            'kelas'=> 'required',
            'jurusan'=> 'required', 
            'no_handphone'=> 'required',
            'email' => 'required',
        ]);

        //fungsi eloquent untuk tambah data 
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim=$request->get('nim');
        $mahasiswa->nama=$request->get('nama');
        $mahasiswa->tanggal_lahir=$request->get('tanggal_lahir');
        $mahasiswa->jurusan=$request->get('jurusan');
        $mahasiswa->no_handphone=$request->get('no_handphone');
        $mahasiswa->email=$request->get('email');

        //fungsi eloquent untuk tambah data dengan relasi belongs to 
        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        //jika data berhasil ditambah 
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');


        // Mahasiswa::create($request->all());
        // return redirect()->route('mahasiswas.index')
        // ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = Mahasiswa::find($nim);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        $Mahasiswa = Mahasiswa::find($nim);
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('Mahasiswa','kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //mekukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
            'email' => 'required'
            ]);

            $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
            $mahasiswa->nim = $request->get('nim');
            $mahasiswa->nama = $request->get('nama');
            $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
            $mahasiswa->jurusan = $request->get('jurusan');
            $mahasiswa->no_handphone = $request->get('no_handphone');
            $mahasiswa->email = $request->get('email');


            $kelas = new Kelas;
            $kelas->id = $request->get('kelas');

            $mahasiswa->kelas()->associate($kelas);
            $mahasiswa->save();

            return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
            // //fungsi eloquent untuk mengupdate data inputan kita
            // Mahasiswa::find($nim)->update($request->all());
            // //jika data berhasil diupdate, akan kembali ke halaman utama
            // return redirect()->route('mahasiswas.index')
            // ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        Mahasiswa::find($nim)->delete();
        return redirect()->route('mahasiswas.index')
        -> with('success', 'Mahasiswa Berhasil Dihapus');
    }
}

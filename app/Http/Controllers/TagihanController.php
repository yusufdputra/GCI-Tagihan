<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Semester;
use App\Models\Tagihan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Kelola Tagihan";
        $tagihan = Tagihan::with('semester')->get();
        $semester = Semester::orderBy('nama')->get();

        return view('tagihan.index', compact('title', 'tagihan', 'semester'));
    }

    public function store(Request $request)
    {
        try {
            // cek apakah jenis tagihan sudah ada atau belum
            $cek = Tagihan::where([
                ['id_semester', $request->id_semester],
                ['nama_tagihan', $request->nama_tagihan],
            ]);

            if (!$cek->exists()) {
                // tambah data tagihan
                $query = Tagihan::insertGetId([
                    'id_semester' => $request->id_semester,
                    'nama_tagihan' => $request->nama_tagihan,
                    'jumlah_bayar' => $request->jumlah_bayar,
                    'created_at' => Carbon::now(),
                ]);
                // tambah ke semua mahasiswa di tabel pembayaran
                // get data mahasiswa
                $mahasiswa = User::whereHas(
                    'roles',
                    function ($q) {
                        $q->where('name', 'mahasiswa');
                    }
                )->get();

                // tambahkan ke tabel pembayaran
                foreach ($mahasiswa as $key => $value) {
                    Pembayaran::insert([
                        'id_mahasiswa' => $value->id,
                        'id_tagihan' => $query,
                        'status' => 0,
                        'created_at' => Carbon::now()
                    ]);
                }
                if ($query != null) {
                    return redirect()->back()->with('success', 'Tagihan berhasil ditambah');
                } else {
                    return redirect()->back()->with('alert', 'Tagihan gagal ditambah');
                }
            } else {
                return redirect()->back()->with('alert', 'Tagihan gagal ditambah, sudah terdaftar');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert', 'Tagihan gagal ditambah');
        }
    }

    public function detail($id_tagihan)
    {
        $tagihan = Tagihan::where('id',$id_tagihan)->with('semester')->first();
   
        $title = "Detail Pembayaran ".$tagihan['nama_tagihan'] . " Semester ". $tagihan['semester'][0]['nama']. " - ". $tagihan['semester'][0]['tahun_ajar'];

        $pembayaran = Pembayaran::with('tagihan', 'mahasiswa')
            ->where('id_tagihan', $id_tagihan)->get(); 


        return view('tagihan.detail', compact('title', 'pembayaran', 'id_tagihan'));
    }

    public function edit($id)
    {
        return Tagihan::find($id);
    }

    public function update(Request $request)
    {   
        try {
            // cek apakah jenis tagihan sudah ada atau belum
            $cek = Tagihan::where([
                ['id_semester', $request->id_semester],
                ['nama_tagihan', $request->nama_tagihan],
                ['jumlah_bayar', $request->jumlah_bayar],
            ]);

            if (!$cek->exists()) {
                // tambah data tagihan
                $query = Tagihan::where('id', $request->id)
                ->update([
                    'id_semester' => $request->id_semester,
                    'nama_tagihan' => $request->nama_tagihan,
                    'jumlah_bayar' => $request->jumlah_bayar,
                    'updated_at' => Carbon::now(),
                ]);
              
                if ($query != null) {
                    return redirect()->back()->with('success', 'Tagihan berhasil diubah');
                } else {
                    return redirect()->back()->with('alert', 'Tagihan gagal diubah');
                }
            } else {
                return redirect()->back()->with('warning', 'Tagihan gagal diubah, sudah terdaftar');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert', 'Tagihan gagal diubah');
        }
    }

    public function hapus(Request $request)
    {   
        Tagihan::where('id', $request->id)->delete();
        // hapus di tabel pembayaran mhs
        // yang memiliki id tagihan terkait
        $query = Pembayaran::where('id_tagihan', $request->id)->delete();

        if ($query) {
            return redirect()->back()->with('success', 'Berhasil menghapus tagihan');
        } else {
            return redirect()->back()->with('alert', 'Gagal menghapus tagihan');
        }
    }
}

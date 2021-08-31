<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Tagihan;
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
        $semester = Semester::all();

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
                $query = Tagihan::insert([
                    'id_semester' => $request->id_semester,
                    'nama_tagihan' => $request->nama_tagihan,
                    'jumlah_bayar' => $request->jumlah_bayar,
                    'created_at' => Carbon::now(),
                ]);
                if ($query) {
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
}

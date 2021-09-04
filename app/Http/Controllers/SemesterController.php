<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SemesterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Kelola Semester";
        $semester = Semester::orderBy('nama')->get();

        return view('semester.index', compact('title', 'semester'));
    }


    public function store(Request $request)
    {
        try {
            // cek apakah semester sudah ada atau belum
            $cek = Semester::where([
                ['nama', $request->nama],
                ['tahun_ajar', $request->tahun_ajar],
            ]);

            if (!$cek->exists()) {
                // tambah data tagihan
                $query = Semester::insertGetId([
                    'nama' => $request->nama,
                    'tahun_ajar' => $request->tahun_ajar,
                    'created_at' => Carbon::now(),
                ]);

                if ($query != null) {
                    return redirect()->back()->with('success', 'Semester berhasil ditambah');
                } else {
                    return redirect()->back()->with('alert', 'Semester gagal ditambah');
                }
            } else {
                return redirect()->back()->with('alert', 'Semester gagal ditambah, sudah terdaftar');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert', 'Semester gagal ditambah');
        }
    }
    public function edit($id)
    {
        return Semester::find($id);
    }


    public function update(Request $request)
    {
        try {
            // cek apakah semester sudah ada atau belum
            $cek = Semester::where([
                ['nama', $request->nama],
                ['tahun_ajar', $request->tahun_ajar],
            ]);

            if (!$cek->exists()) {
                // tambah data tagihan
                $query = Semester::where('id', $request->id)
                    ->update([
                        'nama' => $request->nama,
                        'tahun_ajar' => $request->tahun_ajar,
                        'updated_at' => Carbon::now(),
                    ]);

                if ($query != null) {
                    return redirect()->back()->with('success', 'Semester berhasil diubah');
                } else {
                    return redirect()->back()->with('alert', 'Semester gagal diubah');
                }
            } else {
                return redirect()->back()->with('warning', 'Semester gagal diubah, sudah terdaftar');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert', 'Semester gagal diubah');
        }
    }

    public function hapus(Request $request)
    {
        $query =  Semester::where('id', $request->id)->delete();

        if ($query) {
            return redirect()->back()->with('success', 'Berhasil menghapus Semester');
        } else {
            return redirect()->back()->with('alert', 'Gagal menghapus Semester');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Semester;
use App\Models\Tagihan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Kelola Pembayaran";
        $pembayaran = Pembayaran::with('tagihan', 'mahasiswa')->where('id_mahasiswa', Auth::user()->id)->get();
       
        
       
        return view('pembayaran.index', compact('title', 'pembayaran'));
    }

    public function update($id)
    {
        try {
            Pembayaran::where('id', $id)
                ->update([
                    'status' => 1
                ]);

            return redirect()->back()->with('success', 'Berhasil melakukan pembayaran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert', 'Gagal melakukan pembayaran');
        }
    }
}

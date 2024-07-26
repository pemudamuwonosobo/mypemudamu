<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cabang;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $anggotas = [];
        $jumlahAnggota = 0;
        $draftAnggota = 0;
        $validasiAnggota = 0;
        $verifikasiAnggota = 0;
        $cabangData = [];
        $totals = [];
        $cabangList = [];
        $rantingList = [];
        $selectedCabang = null;
        $cabangs = [];
        $jumlahCabang = 0;
        $jumlahRanting = 0;
        $anggotas = Anggota::all();
        $jumlahAnggota = Anggota::count();
        $draftAnggota = Anggota::where('status', 'Draft')->count();
        $validasiAnggota = Anggota::where('status', 'Validasi')->count();
        $verifikasiAnggota = Anggota::where('status', 'Terverifikasi')->count();
        $jumlahCabang = Cabang::where('cabang_level', 1)->count();
        $jumlahRanting = Cabang::where('cabang_level', 2)->count();

        $cabangData = Cabang::leftJoin('anggotas', 'cabangs.cabang_cd', '=', 'anggotas.cabang')
            ->select(
                'cabangs.cabang_cd as cabang_cd',
                'cabangs.cabang_nm as cabang_nm',
                DB::raw('COUNT(CASE WHEN anggotas.status = "draft" THEN 1 END) as draft_count'),
                DB::raw('COUNT(CASE WHEN anggotas.status = "validasi" THEN 1 END) as validasi_count'),
                DB::raw('COUNT(CASE WHEN anggotas.status = "terverifikasi" THEN 1 END) as verifikasi_count'),
                DB::raw('COUNT(anggotas.id) as total_count')
            )
            ->where('cabangs.cabang_level', 1)
            ->groupBy('cabangs.cabang_cd', 'cabangs.cabang_nm')
            ->get();

        $totals = [
            'draft' => $cabangData->sum('draft_count'),
            'validasi' => $cabangData->sum('validasi_count'),
            'terverifikasi' => $cabangData->sum('verifikasi_count'),
            'total' => $cabangData->sum('total_count'),
        ];

        $cabangList = Cabang::where('cabang_level', 1)->get();
        $rantingList = collect();

        return view('home', [
            'cabangData' => $cabangData,
            'totals' => $totals,
            'cabangList' => $cabangList,
            'rantingList' => $rantingList,
            'anggotas' => $anggotas,
            'jumlahAnggota' => $jumlahAnggota,
            'draftAnggota' => $draftAnggota,
            'validasiAnggota' => $validasiAnggota,
            'verifikasiAnggota' => $verifikasiAnggota,
            'jumlahCabang' => $jumlahCabang,
            'jumlahRanting' => $jumlahRanting,
        ]);
    }


    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
}

<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyImage as Image;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class IdcardController extends Controller
{
    public function index(Request $request)
    {
        $data = Anggota::find($request->data);
        return view('id-card', compact('data'));
    }

    public function show(Request $request)
    {

        $data = Anggota::find(Crypt::decryptString($request->data));
        return view('id-card-download', compact('data'));
    }

    public function showEvent(Request $request)
    {

        $data = Anggota::find(Crypt::decryptString($request->data));
        return view('id-card-download', compact('data'));
    }
}

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

    // public function convertHtmlToJpg(Request $request)
    // {
    //     // Ambil data anggota berdasarkan $id
    //     $data = Anggota::find($request->data);

    //     dd($data);

    //     // Render HTML dari template Blade dengan data anggota
    //     $html = view('id-card', compact('data'))->render();

    //     // Path untuk menyimpan file JPG
    //     $nameImage = Str::random(5) . '.jpg';
    //     $outputFilePath = public_path($nameImage);

    //     // Generate file JPG menggunakan SnappyImage
    //     $snappy = Image::loadHTML($html)
    //         ->setOption('width', 800) // Atur lebar sesuai kebutuhan
    //         ->save($outputFilePath);

    //     // Periksa apakah file berhasil dibuat
    //     if (file_exists($outputFilePath)) {
    //         return response()->json(['message' => 'Successfully converted HTML to JPG.', 'image' => $nameImage]);
    //     } else {
    //         return response()->json(['message' => 'Failed to convert HTML to JPG.'], 500);
    //     }
    // }
}

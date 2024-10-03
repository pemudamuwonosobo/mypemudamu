<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyImage as Image;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class EventCardController extends Controller
{

    public function showEvent(Request $request)
    {

        $data = Event::find(Crypt::decryptString($request->data));
        return view('design-presensi', compact('data'));
    }
}

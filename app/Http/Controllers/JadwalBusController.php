<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalBusController extends Controller
{
    public function index()
{
    $data = session('datadiri');
    if (!$data) {
        return redirect()->route('dashboard')->with('error', 'Silakan isi data diri dulu.');
    }

    return view('jadwal-bus', compact('data'));
}
}

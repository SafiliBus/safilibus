<?php

// app/Http/Controllers/PesanController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function storeDataDiri(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'hp' => 'required|string',
            'tujuan' => 'required|string',
            'tanggal' => 'required|string',
        ]);

        session(['datadiri' => $validated]);

        // Redirect ke halaman jadwal (yang handle-nya udah kamu buat)
        return redirect()->route('jadwal-bus');
    }

    public function batal()
    {
        session()->forget('datadiri');
        return redirect()->route('dashboard');
    }
}

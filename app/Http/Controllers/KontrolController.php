<?php

// app/Http/Controllers/KontrolController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MqttService;

class KontrolController extends Controller
{
    protected MqttService $mqtt;

    public function __construct(MqttService $mqtt)
    {
        $this->mqtt = $mqtt;
    }

   public function kontrolAlat(Request $request)
    {
        dd($request);
        $request->validate([
            'command' => 'required|in:ON,OFF'
        ]);

        // Kirim ke alat, contoh:
        $this->mqtt->publishStatus($request->command);

        return redirect()->back()->with('status', 'Perintah berhasil dikirim: ' . $request->command);
    }

}


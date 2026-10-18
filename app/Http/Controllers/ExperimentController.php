<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExperimentController extends Controller
{
    //
    public function start(Request $request)
    {
        // Mulai sesi eksperimen baru
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Buat ID peserta unik
        $participantId = 'P-' . strtoupper(Str::random(8));

        // Tentukan kondisi eksperimen
        $condition = $request->input('condition', 'normal');

        if (!in_array($condition, ['normal', 'dark_pattern'])) {
            $condition = 'normal';
        }

        // Simpan data eksperimen ke session
        $request->session()->put([
            'participant_id' => $participantId,
            'experiment_condition' => $condition,
            'experiment_started_at' => now()->toIso8601String(),
            'cart' => [],
        ]);

        return response()->json([
            'message' => 'Experiment session created',
            'participant_id' => $participantId,
            'condition' => $condition,
        ]);
    }
}

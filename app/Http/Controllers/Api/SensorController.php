<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use App\Models\SensorData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SensorController extends Controller
{
    // ==================================================
    // SIMPAN DATA DARI ESP32
    // ==================================================

    public function store(Request $request)
    {
        // ==============================================
        // VALIDATION
        // ==============================================

        $request->validate([

            'pm25'       => 'required|numeric',
            'co'         => 'required|numeric',
            'ozone'      => 'required|numeric',
            'temperature'=> 'required|numeric',
            'battery'    => 'required|numeric',
            'status'     => 'required|string',
        ]);

        // ==============================================
        // VALIDASI STATUS
        // ==============================================

        $allowedStatus = [

            'aman',
            'waspada',
            'bahaya'
        ];

        if (!in_array($request->status, $allowedStatus)) {

            return response()->json([

                'status'  => 'error',

                'message' => 'Status tidak valid'

            ], 400);
        }

        // ==============================================
        // SIMPAN DATA SENSOR
        // ==============================================

        $sensor = SensorData::create([

            'pm25'        => $request->pm25,

            'co'           => $request->co,

            'ozone'        => $request->ozone,

            'temperature'  => $request->temperature,

            'battery'      => $request->battery,

            'status'       => $request->status,
        ]);

        // ==============================================
        // STATUS SEKARANG
        // ==============================================

        $currentStatus = $request->status;

        // ==============================================
        // AMBIL ALERT TERAKHIR
        // ==============================================

        $lastAlert = Alert::latest()->first();

        $lastStatus = $lastAlert->type ?? null;

        // ==============================================
        // KIRIM TELEGRAM JIKA STATUS BERUBAH
        // ==============================================

        if ($currentStatus != $lastStatus) {

            $message = '';

            // ==========================================
            // STATUS AMAN
            // ==========================================

            if ($currentStatus == 'aman') {

                $message =

                    "✅ KUALITAS UDARA AMAN\n\n" .

                    "Udara sudah kembali normal.\n\n" .

                    "🌫 PM2.5 : {$sensor->pm25}\n" .
                    "🧪 CO : {$sensor->co}\n" .
                    "☣ Ozon : {$sensor->ozone}\n" .
                    "🌡 Suhu : {$sensor->temperature}°C\n" .
                    "🔋 Battery : {$sensor->battery}%";
            }

            // ==========================================
            // STATUS WASPADA
            // ==========================================

            if ($currentStatus == 'waspada') {

                $message =

                    "⚠️ STATUS WASPADA\n\n" .

                    "Kualitas udara mulai menurun.\n\n" .

                    "🌫 PM2.5 : {$sensor->pm25}\n" .
                    "🧪 CO : {$sensor->co}\n" .
                    "☣ Ozon : {$sensor->ozone}\n" .
                    "🌡 Suhu : {$sensor->temperature}°C\n" .
                    "🔋 Battery : {$sensor->battery}%";
            }

            // ==========================================
            // STATUS BAHAYA
            // ==========================================

            if ($currentStatus == 'bahaya') {

                $message =

                    "🚨 STATUS BAHAYA\n\n" .

                    "Udara berbahaya terdeteksi!\n\n" .

                    "🌫 PM2.5 : {$sensor->pm25}\n" .
                    "🧪 CO : {$sensor->co}\n" .
                    "☣ Ozon : {$sensor->ozone}\n" .
                    "🌡 Suhu : {$sensor->temperature}°C\n" .
                    "🔋 Battery : {$sensor->battery}%";
            }

            // ==========================================
            // TELEGRAM
            // ==========================================

            $telegramSent = false;

            try {

                $response = Http::post(

                    "https://api.telegram.org/bot" .
                    config('services.telegram.bot_token') .
                    "/sendMessage",

                    [

                        'chat_id' => config('services.telegram.chat_id'),

                        'text' => $message
                    ]
                );

                $telegramSent = $response->successful();

            } catch (\Exception $e) {

                $telegramSent = false;
            }

            // ==========================================
            // SIMPAN ALERT
            // ==========================================

            Alert::create([

                'type' => $currentStatus,

                'message' => $message,

                'telegram_sent' => $telegramSent
            ]);
        }

        // ==============================================
        // RESPONSE
        // ==============================================

        return response()->json([

            'status'  => 'success',

            'message' => 'Data berhasil disimpan',

            'data'    => $sensor
        ]);
    }

    // ==================================================
    // AMBIL DATA TERBARU
    // ==================================================

    public function latest()
    {
        $data = SensorData::latest()->first();

        if (!$data) {

            return response()->json([

                'status' => 'error',

                'message' => 'Belum ada data sensor'

            ], 404);
        }

        return response()->json($data);
    }

    // ==================================================
    // AMBIL HISTORI DATA
    // ==================================================

    public function history(Request $request)
    {
        $query = SensorData::query();

        // ==============================================
        // FILTER TANGGAL
        // ==============================================

        if (

            $request->start_date &&
            $request->end_date

        ) {

            $query->whereBetween('created_at', [

                $request->start_date . ' 00:00:00',

                $request->end_date . ' 23:59:59'
            ]);
        }

        // ==============================================
        // AMBIL DATA
        // ==============================================

        $data = $query->latest()
                    ->take(10)
                    ->get();

        return response()->json($data);
    }

    // ==================================================
    // AMBIL 10 ALERT TERBARU
    // ==================================================

    public function alertHistory()
    {
        $alerts = Alert::latest()
            ->take(10)
            ->get();

        return response()->json($alerts);
    }

    // ==================================================
    // AMBIL SEMUA DATA
    // ==================================================

    public function all()
    {
        $data = SensorData::latest()->get();

        return response()->json($data);
    }
}

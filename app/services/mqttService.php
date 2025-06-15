<?php

namespace App\Services;

use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;
use Illuminate\Support\Facades\DB;

class MqttService
{
    protected MqttClient $mqtt;
    protected string $host = '103.127.97.36';
    protected int $port = 1883;
    protected string $clientId;
    protected string $username = 'CoffeOptic';
    protected string $password = '010805';

    public function __construct()
    {
        $this->clientId = 'LaravelClient_' . uniqid();
        $settings = (new ConnectionSettings)
            ->setUsername($this->username)
            ->setPassword($this->password)
            ->setKeepAliveInterval(60);

        $this->mqtt = new MqttClient($this->host, $this->port, $this->clientId);
        $this->mqtt->connect($settings, true);
    }

    public function publishStatus(string $status): void
    {
        $this->mqtt->publish('coffeoptic/alat/status', $status, 0);
        $this->mqtt->disconnect();
    }

    public function subscribeAndSaveData(): void
    {
        $this->mqtt->subscribe('coffeoptic/alat/data', function (string $topic, string $message) {
            echo "Menerima payload: $message\n";

            $data = json_decode($message, true);

            if (!is_array($data) || !isset($data['jumlah'], $data['berat'])) {
                echo "Data tidak valid\n";
                return;
            }

            $jumlah = (int) $data['jumlah']; // Dianggap sebagai jumlah biji buruk
            $berat = (int) $data['berat'];   // Berat total (dalam gram)

            // Cek apakah data hari ini sudah pernah masuk
            $today = now()->format('Y-m-d');

            $last = DB::table('hasil_laporans')
                ->whereDate('tanggal', $today)
                ->orderByDesc('id')
                ->first();

            if ($last && $last->jumlah_biji_buruk == $jumlah && $last->total_berat == $berat) {
                echo "Data sama dengan sebelumnya, tidak disimpan ulang.\n";
                return;
            }

            DB::table('hasil_laporans')->insert([
                'tanggal' => $today,
                'jumlah_biji_buruk' => $jumlah,
                'total_berat' => $berat,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            echo "Data berhasil disimpan ke tabel hasil_laporans.\n";
        }, 0);

        $this->mqtt->loop(true);
    }

}

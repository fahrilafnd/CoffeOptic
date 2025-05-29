<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\MqttService;

class MqttSubscribe extends Command
{
    protected $signature = 'mqtt:subscribe';
    protected $description = 'Subscribe to MQTT topic and simpan data sortir';

    public function handle(MqttService $mqtt)
    {
        $this->info('Menunggu data dari alat...');
        $mqtt->subscribeAndSaveData();
    }
    
}


<?php

use Illuminate\Console\Command;
use App\Services\MqttService;

class MqttListen extends Command
{
    protected $signature = 'mqtt:listen';
    protected $description = 'Listen to MQTT and save data to MySQL';

    public function handle()
    {
        app(MqttService::class)->subscribeAndSaveData();
    }
}

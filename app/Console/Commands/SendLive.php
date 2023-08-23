<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Api\NotiController;

class SendLive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'live:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Sending Live Notification to Users';

    /**
     * Execute the console command.
     */
    public function handle(NotiController $controller)
    {
        $controller->sendLiveNoti();
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Task\GameController;

class DeleteGameRecord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Delete Game Records After last 10 days';

    /**
     * Execute the console command.
     */
    public function handle(GameController $controller)
    {
        $controller->deleteGameRecord();
    }
}

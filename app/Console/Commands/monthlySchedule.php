<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class monthlySchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run schedule every month';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo 'Test scheduler';
    }
}

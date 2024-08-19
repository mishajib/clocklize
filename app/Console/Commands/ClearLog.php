<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:logs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all logs file from storage/logs';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Clearing logs...');

        $files = glob(storage_path('logs/*.log'));

        foreach ($files as $file) {
            if (is_file($file)) {
                // clear content
                file_put_contents($file, '');
            }
        }

        $this->info('Logs have been cleared!');
    }
}

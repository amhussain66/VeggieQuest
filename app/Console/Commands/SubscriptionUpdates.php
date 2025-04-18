<?php

namespace App\Console\Commands;

use App\Http\Controllers\WebsiteController;
use Illuminate\Console\Command;

class SubscriptionUpdates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updatesubscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $myController = new WebsiteController();
        $myController->update_subscription_status();
    }
}

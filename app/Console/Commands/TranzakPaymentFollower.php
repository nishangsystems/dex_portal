<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TranzakPaymentFollower extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tranzak_payment_follower';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run a check for all pending tranzak transaction';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}

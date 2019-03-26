<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Trainee;
use Carbon\Carbon;

class InactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify : inactive users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check and Notify incative users for a month';

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
     * @return mixed
     */
    public function handle()
    {
        //
    }
}

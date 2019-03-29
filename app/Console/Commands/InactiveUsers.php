<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Trainee;
use Carbon\Carbon;
use App\Notifications\MailNotifier;

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
    protected $description = 'Check and Notify incative users for 30 days';

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
        $time_now = Carbon::now()->timestamp;
        $trainees =  Trainee::all();
        $time_now = Carbon::now();
        foreach ($trainees as $trainee) {
            $last_login_from_db = $trainee->last_login;
            $last_login = Carbon::parse($last_login_from_db);
            $days = $last_login->diffInDays($time_now);
            if ($days >30) {
                $trainee->notify(new MailNotifier($trainee));
            }
        }
    }
}

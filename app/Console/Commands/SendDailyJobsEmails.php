<?php

namespace App\Console\Commands;

use App\Job;
use App\Notifications\NewJobsDailyNotification;
use App\User;
use Illuminate\Console\Command;

class SendDailyJobsEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jobs:digest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily emails to users with list of new jobs';

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
        $jobs = Job::with('skills')
            ->whereHas('skills')
            ->whereBetween('created_at', [now()->subDay(), now()])
            ->get();

        $users = User::with('skills')
            ->where('notifications_frequency', 'once')
            ->get();

        foreach($users as $user)
        {
            $userSkills = $user->skills;
            $userJobs = $jobs->filter(function ($job) use ($userSkills) {
                return $job->skills->contains(function($key, $value) use($userSkills) {
                    return $userSkills->contains($value);
                });
            });

            if($userJobs->count())
            {
                $user->notify(new NewJobsDailyNotification($userJobs));
            }
        }     
    }
}

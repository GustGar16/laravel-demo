<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CustomDataBase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:schedule_db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrations and seeders';

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
        if(!\Schema::hasTable('migrations')){
            \Artisan::call('migrate');
            \Artisan::call('db:seed');
        }
        else
            \Artisan::call('migrate:refresh --seed');

        $this->info('The database schedule has been done');
    }
}

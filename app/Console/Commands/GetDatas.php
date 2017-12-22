<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetDatas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getData:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gettin data';

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
        $this->info("works\n");

        $bar = $this->output->createProgressBar(2);

        $bar->advance();
        $bar->advance();
        $bar->advance();
    }
}

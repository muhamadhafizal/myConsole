<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Hello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Hello {name=Hafizal} {--L|lastname=hussin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is our own command';

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
        // $name = $this->argument('name');
        // // $lastname = $this->argument('age');
        // $lastname = $this->option('lastname');

        // $this->info($name . ' ' . $lastname );

        $confirm = $this->confirm('are you sure want to delete');

        if($confirm){
            $this->info('success');
        } else {
            $this->info('failed');
        }
    }
}

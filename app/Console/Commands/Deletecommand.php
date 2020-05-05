<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use DB;

class Deletecommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'imcs:deletecommand {tablename} {year} {month}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete list by month and year';

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
        $tablename = $this->argument('tablename');
        $year = $this->argument('year');
        $month = $this->argument('month');

        $tempdate = $year . '/' . $month . '/01';
        $time = strtotime($tempdate);
        $newDate = date("Y-m-d H:i:s", $time);

        DB::table('users')->whereMonth('created_at',$month)->whereYear('created_at',$year)->delete();

        $this->info('Success');
    }
}
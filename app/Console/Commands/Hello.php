<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Post;
use Carbon\Carbon;

class Hello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'imcs:list {tablename} {year} {month}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List of data based on tablename, year, month';

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
       
        if($tablename == 'users'){
            //query
            $data = User::selectRaw('year(created_at) year, month(created_at) month, count(*) data')
            ->where('created_at','<',$newDate)
            ->groupBy('month','year')
            ->orderBy('year','asc')
            ->get();
            $header = ['year','month','data'];
        } elseif ($tablename == 'posts'){
            $data = Post::where("created_at",">", $newDate->subMonth(6))->get();
            $header = ['id','title','desc','userid','created_at','updated_at'];
        } else {
            $data = ['no data'];
            $header = ['title'];
        }
        $confirm = $this->confirm('you choose tablename:' . $tablename . ' year:'. $year . ' month:' . $month);

        if($confirm){
            //$this->info($current);
            $this->table($header,$data);
        } else {
            $this->info('failed');
        }
    }
}

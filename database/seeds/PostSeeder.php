<?php

use Illuminate\Database\Seeder;
use Carbon\carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'A',
            'desc' => 'abcdef',
            'userid' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'B',
            'desc' => 'abcdef',
            'userid' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'C',
            'desc' => 'abcdef',
            'userid' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'D',
            'desc' => 'abcdef',
            'userid' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

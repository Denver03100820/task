<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //intial inserting of status
        $statuses = array(
                        ['id' => Str::uuid() , 'status_code' => 'TD' , 'status_description' => 'TO DO'],
                        ['id' => Str::uuid() , 'status_code' => 'IP' , 'status_description' => 'IN PROGRESS'],
                        ['id' => Str::uuid() , 'status_code' => 'C' , 'status_description' => 'COMPLETED']
                    );

        DB::table('statuses')->insert($statuses);
    }
}

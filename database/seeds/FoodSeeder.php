<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('foods')->insert([
            [
                'id' => '1',
                'name' => 'geprek',
                'price' => '15000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => '2',
                'name' => 'lotek',
                'price' => '12000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
            
        ]);
    }
}

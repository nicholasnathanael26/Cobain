<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ingredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ingredients')->insert([
            [
                'id' => '1',
                'name' => 'ayam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => '2',
                'name' => 'sayur',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
            
        ]);
    }
}

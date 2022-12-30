<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('recipes')->insert([
            [
                'id' => '1',
                'food_id' => '1',
                'ingredient_id' => '1',
                'qty' => '1',
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString()
            ],
            [
                'id' => '2',
                'food_id' => '2',
                'ingredient_id' => '2',
                'qty' => '1',
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString()
            ]
            
        ]);
    }
}

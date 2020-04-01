<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            'Mujer',
            'Hombre'
        ];

        foreach ($genders as $key => $value) {
            DB::table('genders')->insert([
                'gender' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }

    }
}

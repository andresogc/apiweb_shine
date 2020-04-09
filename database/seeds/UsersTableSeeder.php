<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Juan Camilo',
            'birthday' => '1992-03-15',
            'email' => 'juan@gmail.com',
            'password' => '$2y$10$Ccs0C6GZXE4h57aYiTuCd.L.55cFLkuW5qPETdCbU9VF1OShtrSw6',
            'gender_id' => '2',
            'search' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}

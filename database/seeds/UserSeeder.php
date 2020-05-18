<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startTime = \Carbon\Carbon::yesterday()->startOfDay();
        $endTime = \Carbon\Carbon::yesterday()->endOfDay();

        $time = $startTime->clone();
        while ($time->lessThan($endTime)) {
            $user = factory(\App\User::class)->make();
            $user->created_at = $time;
            $user->updated_at = $time;
            $user->save();

            $time->addHour();
        }

    }
}

<?php

use Illuminate\Database\Seeder;

class LookUpsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('look_ups')->insert([
            [
                'id' => 1,
                'code' => 'Mon',
                'name' => 'Monday',
                'category' => 'days_of_week',
                'color' => '#795548FF',
                'sequence' => '1',
            ],
            [
                'id' => 2,
                'code' => 'Tue',
                'name' => 'Tuesday',
                'category' => 'days_of_week',
                'color' => '#00BCD4FF',
                'sequence' => '2',
            ],
            [
                'id' => 3,
                'code' => 'Wed',
                'name' => 'Wednesday',
                'category' => 'days_of_week',
                'color' => '#FFEE58FF',
                'sequence' => '3',
            ],
            [
                'id' => 4,
                'code' => 'Thu',
                'name' => 'Thursday',
                'category' => 'days_of_week',
                'color' => '#D4E157FF',
                'sequence' => '4',
            ],
            [
                'id' => 5,
                'code' => 'Fri',
                'name' => 'Friday',
                'category' => 'days_of_week',
                'color' => '#B3E5FCFF',
                'sequence' => '5',
            ],
            [
                'id' => 6,
                'code' => 'Sat',
                'name' => 'Saturday',
                'category' => 'days_of_week',
                'color' => '#00695CFF',
                'sequence' => '6',
            ],
            [
                'id' => 7,
                'code' => 'Sun',
                'name' => 'Sunday',
                'category' => 'days_of_week',
                'color' => '#4caf50',
                'sequence' => '7',
            ],
        ]);
    }
}

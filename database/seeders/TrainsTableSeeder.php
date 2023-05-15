<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use DateInterval;
use DateTime;
use DateTimeImmutable;
use App\Functions\Helpers;


class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run(Faker $faker)
    // {
    //     for($i=0; $i<1000; $i++) {

    //         $train = new Train();
    //         $train->company = $faker->company();
    //         $train->departure_station = $faker->city();
    //         $train->arrival_station = $faker->city();
    //         do {
    //             $train->arrival_station = $faker->city();
    //         } while ($train->departure_station == $train->arrival_station);
    //         $newDate = $faker->dateTimeInInterval('-3 days', '+3 days','Europe/Rome');
    //         $newDate = DateTimeImmutable::createFromMutable($newDate);
    //         $train->departure_date = $newDate;
    //         $train->arrival_date = $newDate->add(new DateInterval('PT'.rand(1,10).'H'));
    //         $train->code = $faker->randomNumber(5, true);
    //         $train->wagons_number = $faker->numberBetween(2, 20);
    //         $train->on_time = $faker->numberBetween(0,1);
    //         if(!$train->on_time){
    //             $train->cancelled = $faker->numberBetween(0,1);
    //         }else{
    //             $train->cancelled = false;
    //         }
    //         $train->save();
    //     }
    // }

    public function run()
    {
        $csvContent = Helpers::getCsvContent(__DIR__ . '/trains.csv');

        foreach ($csvContent as $index => $row) {
            if ($index > 0) {
                $train = new Train();
                $train->company = $row[0];
                $train->departure_station = $row[1];
                $train->arrival_station = $row[2];
                $train->departure_date = $row[3];
                $train->arrival_date = $row[4];
                $train->train_code = $row[5];
                $train->wagons_number = $row[6];
                $train->on_time = $row[7];
                $train->cancelled = $row[8];
                $train->save();
            }
        }
    }
}

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        /**$table->string('name');$table->text('detail');
            $table->string('sponsor');$table->integer('price');
            $table->integer('duration');$table->date('start');
            $table->date('finish');
            $table->integer('user_id');*/
                'name'=>$faker->name,
                'detail'=>$faker->paragraph,
                'sponsor'=>$faker->company,
                'price'=>$faker->numberBetween(100,100000),
                'duration'=>$faker->numberBetween(1,60),
                'start'=>$faker->dateTime( $max ='now', $timezone = 'Europe/Paris'),
                'finish'=>$faker->dateTimeBetween($startDate = 'now',
                $endDate = '5 years', $timezone = 'Europe/Paris'),
                'user_id'=>function(){
                    return App\User::all()->random();
                },
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use App\Model\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        /**$table->string('customer'); $table->text('review');
            $table->integer('star'); */
            'product_id'=>function(){
                return Product::all()->random();
            },
            'customer'=>$faker->name,
            'review'=>$faker->paragraph,
            'star'=>$faker->numberBetween(0,5)
    ];
});

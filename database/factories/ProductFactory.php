<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        /**$table->string('name');
                $table->text('detail');
                $table->integer('price');
                $table->integer('stock'); $table->integer('discount');*/
            'name'=>$faker->word,
            'detail'=>$faker->paragraph,
            'price'=>$faker->numberBetween(100,1000),
            'stock'=>$faker->randomDigit,
            'discount'=>$faker->numberBetween(2,30),
    ];
});

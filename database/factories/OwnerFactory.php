<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Owner;
use App\Model\Project;
use Faker\Generator as Faker;

$factory->define(Owner::class, function (Faker $faker) {
    return [
         /**$table->string('name');$table->string('position');
            $table->string('department');$table->string('phone');
            $table->string('supervisor');$table->text('review');*/
            'project_id'=>function(){ return Project::all()->random(); },
            'name'=>$faker->name,
            'position'=>$faker->jobTitle,
            'department'=>$faker->company,
            'phone'=>$faker->tollFreePhoneNumber,
            'supervisor'=>$faker->name,
            'review'=>$faker->paragraph,
        ];
});

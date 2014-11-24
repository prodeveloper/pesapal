<?php
$faker= Faker\Factory::create();
$order= new Pesapal\Entities\Order(
    rand(10,1000),
    $faker->paragraph(),
    $faker->email,
    $faker->firstName,
    $faker->lastName,
    $faker->phoneNumber,
    uniqid("trans_"),
    'MERCHANT'


);
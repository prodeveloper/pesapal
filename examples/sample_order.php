<?php
$faker= Faker\Factory::create();
$order= new Pesapal\Entities\Order(
    $faker->randomNumber(),
    $faker->paragraph(),
    $faker->email,
    $faker->firstName,
    $faker->lastName,
    $faker->phoneNumber,
    uniqid("trans_"),
    'MERCHANT'


);
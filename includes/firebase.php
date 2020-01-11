<?php

require __DIR__.'/../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$ServiceAccount = ServiceAccount::fromJsonFile(__DIR__.'/tiketsaya-bb541-a9b2faccc8dc.json'); //Menenempatkan Use Permission from database

//Setting Data Base
$firebase = (new Factory)
    ->withServiceAccount($ServiceAccount)
    // The following line is optional if the project id in your credentials file
    // is identical to the subdomain of your Firebase project. If you need it,
    // make sure to replace the URL with the URL of your project.
    ->withDatabaseUri('https://tiketsaya-bb541.firebaseio.com/')
    ->create();

$database = $firebase->getDatabase();


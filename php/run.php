<?php

declare(strict_types=1);

const USER_URL = 'https://randomuser.me/api/?inc=gender,name,email,location&results=5&seed=a9b25cd955e2037h';

function parseCSVFile(): array
{
    # Parse CSV file
    $getCurrentWorkingDirectory = __DIR__;

    // fields: ID, gender, Name ,country, postcode, email, Birthdate
    $csv_provider = array_map('str_getcsv', file($getCurrentWorkingDirectory . '/users.csv'));

    array_shift($csv_provider); # Remove header column
    return $csv_provider;
}

function parseURLContent(): array
{
    $url = USER_URL;
    $web_provider = json_decode(file_get_contents($url))->results;

    $formattedUsers = [];
    $id = 100000000000;
    foreach ($web_provider as $item) {
        $id++;
        if ($item instanceof stdClass) {
            $formattedUsers[] = [
                $id,
                $item->gender,
                $item->name->first . ' ' . $item->name->last,
                $item->location->country,
                $item->location->postcode,
                $item->email,
                (new Datetime('now'))->format('Y') // birhtday
            ];
        }
    }

    return $formattedUsers;
}

$webUsers = parseURLContent();
$csvUsers = parseCSVFile();

/**
 * @param $providers [ id -> number,
 *                   email -> string
 *                   first_name -> string
 *                   last_name -> string ] array
 */
$providers = array_merge($csvUsers, $webUsers); # merge arrays

# Print users
echo "*********************************************************************************" . PHP_EOL;
echo "* ID\t\t* COUNTRY\t* NAME\t\t* EMAIL\t\t\t\t*" . PHP_EOL;
echo "*********************************************************************************" . PHP_EOL;
foreach ($providers as $item) {
    echo sprintf("* %s\t* %s\t* %s\t* %s\t*", $item[0], $item[3], $item[2], $item[5]) . PHP_EOL;
}
echo "*********************************************************************************" . PHP_EOL;
echo count($providers) . ' users in total!' . PHP_EOL;

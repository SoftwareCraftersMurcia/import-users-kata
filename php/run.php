<?php

declare(strict_types=1);

require './vendor/autoload.php';

function parseCSVFile(): array
{
    // fields: ID, gender, Name ,country, postcode, email, Birthdate
    $userList = array_map('str_getcsv', file(__DIR__ . '/../users.csv'));
    array_shift($userList); # Remove header column

    return $userList;
}

$userListCsv = parseCSVFile();

# Parse URL content
const USER_URL = 'https://randomuser.me/api/?inc=gender,name,email,location&results=5&seed=a9b25cd955e2037h';

function userListWeb(): array
{
    $list = json_decode(file_get_contents(USER_URL))->results;

    $b = [];
    $i = 100000000000;
    foreach ($list as $item) {
        $i++;
        if ($item instanceof stdClass) {
            $b[] = [
                $i, // id
                $item->gender,
                $item->name->first . ' ' . $item->name->last,
                $item->location->country,
                $item->location->postcode,
                $item->email,
                (new Datetime('now'))->format('Y') // birhtday
            ];
        }
    }
    return $b;
}

$userListWeb = userListWeb();

/**
 * @param $userList [ id -> number,
 *                   email -> string
 *                   first_name -> string
 *                   last_name -> string ] array
 */
$userList = array_merge($userListCsv, $userListWeb);

# Print users
echo "*********************************************************************************" . PHP_EOL;
echo "* ID\t\t* COUNTRY\t* NAME\t\t* EMAIL\t\t\t\t*" . PHP_EOL;
echo "*********************************************************************************" . PHP_EOL;
foreach ($userList as $item) {
    echo sprintf("* %s\t* %s\t* %s\t* %s\t*", $item[0], $item[3], $item[2], $item[5]) . PHP_EOL;
}
echo "*********************************************************************************" . PHP_EOL;
echo count($userList) . ' users in total!' . PHP_EOL;

<?php
declare(strict_types=1);

namespace ImportUsersKata;

class Importer
{
    public function importFile(string $getcurrentworkingDirectory): array
    {
        $csv_provider = array_map('str_getcsv', file($getcurrentworkingDirectory . '/../users.csv'));
        array_shift($csv_provider); # Remove header column
        $this->printUsers($csv_provider);
        return array([], $csv_provider, []);
    }

    protected function retrieveContent(string $url)
    {
        return file_get_contents($url);
    }

    private function printUsers(array $csv_provider): void
    {
# Print users
        echo "*********************************************************************************" . PHP_EOL;
        echo "* ID\t\t* COUNTRY\t* NAME\t\t* EMAIL\t\t\t\t*" . PHP_EOL;
        echo "*********************************************************************************" . PHP_EOL;
        foreach ($csv_provider as $item) {
            echo sprintf("* %s\t* %s\t* %s\t* %s\t*", $item[0], $item[3], $item[2], $item[5]) . PHP_EOL;
        }
        echo "*********************************************************************************" . PHP_EOL;
        echo count($csv_provider) . ' users in total!' . PHP_EOL;
    }
}

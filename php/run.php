<?php

declare(strict_types=1);

use ImportUsersKata\Importer;

require 'vendor/autoload.php';


(new Importer())->importFile(__DIR__);

<?php

declare(strict_types=1);
require 'vendor/autoload.php';

use ImportUsersKata\Test\FakeImporter;

(new FakeImporter())->importFile(__DIR__);

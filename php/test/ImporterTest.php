<?php
declare(strict_types=1);

namespace ImportUsersKata\Test;

use ImportUsersKata\Importer;
use PHPUnit\Framework\TestCase;

final class ImporterTest extends TestCase
{

    /** @test */
    public function the_response_does_not_change(): void
    {
        $importer = new FakeImporter();

        $response = $importer->importFile('.');

        $expectedResponse = json_decode('[
        [],
        [["200189617246","male","Lukas Schmidt","Germany","10780","lukas.shmidt@example.com","1997-02-19T04:10:00.000Z"],["200189016257","female","Maria Fischer","Germany","15010","maria.fischer@example.com","1991-08-06T09:20:00.000Z"],["230573109005","male","Luis Sanchez","Spain ","15340","luis.sanchez@example.com","2001-06-22T04:21:00.000Z"],["230854119034","male","Elio Pausini","Italy ","38019","elio.pausini@example.com","1976-04-11T04:20:00.000Z"],["270054311737","male","Mitesh Kumari","India ","82068","mitesh.kumari@example.com","1996-12-30T04:23:00.000Z"],["202160712259","female","Elena Mueller","Germany","8025","elena.muller@example.com","1992-02-02T02:10:00.000Z"],["270554319031","female","Natasha Shah","India ","82120","natasha.shah@example.com","1989-01-10T04:21:00.000Z"]]
        ,[]]', true);
        $this->assertEquals($expectedResponse, $response);
    }

    /** @test */
    public function the_output_does_not_change(): void
    {
        $importer = new FakeImporter();
        ob_start();

        $importer->importFile('.');

        $output = ob_get_clean();
        $expectedOutput = '*********************************************************************************
* ID		* COUNTRY	* NAME		* EMAIL				*
*********************************************************************************
* 200189617246	* Germany	* Lukas Schmidt	* lukas.shmidt@example.com	*
* 200189016257	* Germany	* Maria Fischer	* maria.fischer@example.com	*
* 230573109005	* Spain 	* Luis Sanchez	* luis.sanchez@example.com	*
* 230854119034	* Italy 	* Elio Pausini	* elio.pausini@example.com	*
* 270054311737	* India 	* Mitesh Kumari	* mitesh.kumari@example.com	*
* 202160712259	* Germany	* Elena Mueller	* elena.muller@example.com	*
* 270554319031	* India 	* Natasha Shah	* natasha.shah@example.com	*
*********************************************************************************
7 users in total!
';
        $this->assertEquals($expectedOutput, $output);

    }
}

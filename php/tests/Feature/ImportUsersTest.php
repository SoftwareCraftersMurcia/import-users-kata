<?php

declare(strict_types=1);

namespace KataTest\Feature;

use PHPUnit\Framework\TestCase;

final class ImportUsersTest extends TestCase
{
    public function test_output_after_running_command(): void
    {
        $expected = <<<EOT
*********************************************************************************
*ID*COUNTRY*NAME*EMAIL*
*********************************************************************************
*200189617246*Germany*LukasSchmidt*lukas.shmidt@example.com*
*200189016257*Germany*MariaFischer*maria.fischer@example.com*
*230573109005*Spain*LuisSanchez*luis.sanchez@example.com*
*230854119034*Italy*ElioPausini*elio.pausini@example.com*
*270054311737*India*MiteshKumari*mitesh.kumari@example.com*
*202160712259*Germany*ElenaMueller*elena.muller@example.com*
*270554319031*India*NatashaShah*natasha.shah@example.com*
*100000000001*Australia*NevaehDunn*nevaeh.dunn@example.com*
*100000000002*Norway*SaraAbdallah*sara.abdallah@example.com*
*100000000003*France*MelvinPerrin*melvin.perrin@example.com*
*100000000004*Australia*DawnSnyder*dawn.snyder@example.com*
*100000000005*Netherlands*IrinaKaptein*irina.kaptein@example.com*
*********************************************************************************
12usersintotal!
EOT;
        exec('php run.php', $output);

        $actual = implode("\n", $output);
        $actual = str_replace([" ", "\t"], '', $actual);

        self::assertEquals($expected, $actual);
    }
}

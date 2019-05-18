<?php


namespace App\Tests\Utils;

use App\Entity\TripMeasures;
use App\Utils\TripUtils;
use PHPUnit\Framework\TestCase;

class TripUtilsTest extends TestCase
{

    public function testFindLongestPart()
    {
        $tripUtils = new TripUtils();
        $tripMeasures = [
            (new TripMeasures())->setDistance(0.19)->setId(1),
            (new TripMeasures())->setDistance(0.50)->setId(2),
            (new TripMeasures())->setDistance(1)->setId(3)
        ];

        $tripMeasure = $tripUtils->findLongestPart($tripMeasures);

        $this->assertEquals(3,$tripMeasure->getId());

        $tripMeasures = [
            (new TripMeasures())->setDistance(0.01)->setId(1),
            (new TripMeasures())->setDistance(0.75)->setId(2),
            (new TripMeasures())->setDistance(1)->setId(3)
        ];

        $tripMeasure = $tripUtils->findLongestPart($tripMeasures);

        $this->assertEquals(2,$tripMeasure->getId());

        $tripMeasures = [
            (new TripMeasures())->setDistance(0.75)->setId(1),
            (new TripMeasures())->setDistance(0.80)->setId(2),
            (new TripMeasures())->setDistance(1)->setId(3)
        ];

        $tripMeasure = $tripUtils->findLongestPart($tripMeasures);

        $this->assertEquals(1,$tripMeasure->getId());
    }
 }

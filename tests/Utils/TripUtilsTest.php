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

        $this->assertSame(1,$tripMeasure->getId());

        $tripMeasures = [
            (new TripMeasures())->setDistance(0.75)->setId(1),
            (new TripMeasures())->setDistance(-0.80)->setId(2),
            (new TripMeasures())->setDistance(1)->setId(3)
        ];

        $tripMeasure = $tripUtils->findLongestPart($tripMeasures);

        $this->assertSame(1,$tripMeasure->getId());
    }

    public function testCalculateSpeed()
    {
        $tripUtils = new TripUtils();

        $speed = $tripUtils->calculateSpeed(0.90,15);
        $this->assertSame(216.0, $speed);

        $tripUtils = new TripUtils();

        $speed = $tripUtils->calculateSpeed(-0.90,15);
        $this->assertSame(0.0, $speed);

        $tripUtils = new TripUtils();

        $speed = $tripUtils->calculateSpeed(0.0,15);
        $this->assertSame(0.0, $speed);

        $tripUtils = new TripUtils();

        $speed = $tripUtils->calculateSpeed(0.90,0);
        $this->assertSame(0.0, $speed);

        $tripUtils = new TripUtils();

        $speed = $tripUtils->calculateSpeed(0.90,-15);
        $this->assertSame(0.0, $speed);
    }
 }

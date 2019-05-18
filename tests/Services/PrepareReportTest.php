<?php


namespace App\Tests\Services;


use App\Entity\TripMeasures;
use App\Entity\Trips;
use App\Services\PrepareReport;
use App\Utils\TripUtils;
use PHPUnit\Framework\TestCase;

class PrepareReportTest extends TestCase
{
    private $name = "Test trip";
    private $distanceZeroTripMeasures = 0;
    private $distanceThreeTripMeasures = 0.5;
    private $avgSpeedZeroTripMeasures = 0.0;
    private $avgSpeedThreeTripMeasures = 74.0;
    private $measureInterval = 15;

    public function testPrepareReportForTrip()
    {
        $trip = new Trips();
        $trip->setName($this->name);
        $trip->setMeasureInterval($this->measureInterval);

        $prepareReportService = new PrepareReport(new TripUtils());
        $report = $prepareReportService->prepareReportForTrip($trip);

        $this->assertSame($this->distanceZeroTripMeasures,$report->getDistance());
        $this->assertSame($this->measureInterval,$report->getMeasureInterval());
        $this->assertSame($this->name,$report->getName());
        $this->assertSame($this->avgSpeedZeroTripMeasures,$report->getAvgSpeed());

        $tripMeasure1 = new TripMeasures();
        $tripMeasure1->setDistance(0.0);
        $trip->addTripMeasure($tripMeasure1);
        $tripMeasure2 = new TripMeasures();
        $tripMeasure2->setDistance(0.19);
        $trip->addTripMeasure($tripMeasure2);
        $tripMeasure3 = new TripMeasures();
        $tripMeasure3->setDistance(0.50);
        $trip->addTripMeasure($tripMeasure3);

        $report = $prepareReportService->prepareReportForTrip($trip);

        $this->assertSame($this->distanceThreeTripMeasures,$report->getDistance());
        $this->assertSame($this->measureInterval,$report->getMeasureInterval());
        $this->assertSame($this->name,$report->getName());
        $this->assertSame($this->avgSpeedThreeTripMeasures,$report->getAvgSpeed());

    }
}
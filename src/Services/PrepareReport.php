<?php
namespace App\Services;

use App\Entity\Trips;
use App\Models\TripReport;
use App\Utils\TripUtils;
use Doctrine\Common\Collections\ArrayCollection;

class PrepareReport
{

    /**
     * @var TripUtils
     */
    private $tripUtils;

    /**
     * PrepareReport constructor.
     * @param TripUtils $tripUtils
     */
    public function __construct(TripUtils $tripUtils)
    {
        $this->tripUtils = $tripUtils;
    }


    /**
     * @param Trips $trips
     * @return TripReport
     */
    public function prepareReportForTrip(Trips $trips):TripReport
    {
        $tripReport = new TripReport();
        $tripReport->setName($trips->getName());
        $tripReport->setMeasureInterval($trips->getMeasureInterval());

        /** @var ArrayCollection $measures */
        $measures = $trips->getTripsMeasures();

        if ($measures->count() < 2) {
            $tripReport->setDistance(0);
            $tripReport->setAvgSpeed(0.0);
            return $tripReport;
        }

        $longestTripPart = $this->tripUtils->findLongestPart($measures->toArray());
        $distance = $longestTripPart->getDistance() - $measures[$measures->indexOf($longestTripPart) - 1]->getDistance();
        $tripReport->setAvgSpeed($this->tripUtils->calculateSpeed($distance,$trips->getMeasureInterval()));
        $tripReport->setDistance($measures->last()->getDistance());

        return $tripReport;
    }
}
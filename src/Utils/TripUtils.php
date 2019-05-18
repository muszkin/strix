<?php


namespace App\Utils;


use App\Entity\TripMeasures;

class TripUtils
{
    /**
     * @param TripMeasures[] $tripsMeasures
     * @return TripMeasures
     */
    public function findLongestPart(array $tripsMeasures): TripMeasures
    {
        $totalDistance = 0;
        $longestPartId = null;
        $longestPartDistance = null;
        foreach ($tripsMeasures as $key => $tripsMeasure) {
            $part = $tripsMeasure->getDistance() - $totalDistance;
            if ($part > $longestPartDistance) {
                $longestPartId = $key;
                $longestPartDistance = $part;
            }
            $totalDistance += $part;
        }
        return $tripsMeasures[$longestPartId];
    }
}
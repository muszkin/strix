<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TripMeasures
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="trip_measures")
 */
class TripMeasures
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="Trips",inversedBy="tripsMeasures")
     * @ORM\JoinColumn(name="trip_id",referencedColumnName="id",onDelete="CASCADE")
     */
    private $trip;

    /**
     * @var float
     * @ORM\Column(type="decimal",scale=2,precision=5)
     */
    private $distance;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return TripMeasures
     */
    public function setId(int $id): TripMeasures
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getTrip(): int
    {
        return $this->trip;
    }

    /**
     * @param int $trip
     * @return TripMeasures
     */
    public function setTrip(int $trip): TripMeasures
    {
        $this->trip = $trip;
        return $this;
    }

    /**
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }

    /**
     * @param float $distance
     * @return TripMeasures
     */
    public function setDistance(float $distance): TripMeasures
    {
        $this->distance = $distance;
        return $this;
    }


}
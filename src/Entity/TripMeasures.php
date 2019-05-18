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
     * @ORM\Column(type="integer",options={"autoincrement":true})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Trips",inversedBy="tripsMeasures", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $trip;

    /**
     * @var int
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
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
     */
    public function setTrip(int $trip): void
    {
        $this->trip = $trip;
    }

    /**
     * @return int
     */
    public function getDistance(): int
    {
        return $this->distance;
    }

    /**
     * @param int $distance
     */
    public function setDistance(int $distance): void
    {
        $this->distance = $distance;
    }


}
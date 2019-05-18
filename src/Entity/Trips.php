<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Trips
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table("trips")
 */
class Trips
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer", options={"autoincrement":true})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string",length=20)
     */
    private $name;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $measure_interval;

    /**
     * @ORM\OneToMany(targetEntity="TripMeasures",mappedBy="trip_id")
     */
    private $tripsMeasures;

    public function __construct()
    {
        $this->tripsMeasures = new ArrayCollection();
    }

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getMeasureInterval(): int
    {
        return $this->measure_interval;
    }

    /**
     * @param int $measure_interval
     */
    public function setMeasureInterval(int $measure_interval): void
    {
        $this->measure_interval = $measure_interval;
    }

    /**
     * @return ArrayCollection<TripMeasures>
     */
    public function getTripsMeasures()
    {
        return $this->tripsMeasures;
    }

    /**
     * @param TripMeasures $measures
     */
    public function addTripMeasure(TripMeasures $measures)
    {
        $this->tripsMeasures->add($measures);
    }

    /**
     * @param TripMeasures $measures
     */
    public function removeTripMeasure(TripMeasures $measures)
    {
        $this->tripsMeasures->removeElement($measures);
    }


}
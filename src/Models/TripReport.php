<?php


namespace App\Models;


class TripReport
{
    private $name;
    private $distance;
    private $measure_interval;
    private $avg_speed;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param mixed $distance
     */
    public function setDistance($distance): void
    {
        $this->distance = $distance;
    }

    /**
     * @return mixed
     */
    public function getMeasureInterval()
    {
        return $this->measure_interval;
    }

    /**
     * @param mixed $measure_interval
     */
    public function setMeasureInterval($measure_interval): void
    {
        $this->measure_interval = $measure_interval;
    }

    /**
     * @return mixed
     */
    public function getAvgSpeed()
    {
        return $this->avg_speed;
    }

    /**
     * @param mixed $avg_speed
     */
    public function setAvgSpeed($avg_speed): void
    {
        $this->avg_speed = $avg_speed;
    }


}
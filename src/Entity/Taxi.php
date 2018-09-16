<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Taxi
{
    /**
     * @Assert\NotBlank()
     */
    public $fullName;


    /**
     * @Assert\NotBlank()
     */
    public $mobileNumber;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    public $dateOfArrival;

    /**
     * @Assert\NotBlank()
     */
    public $airport;

    /**
     * @Assert\NotBlank()
     */
    public $terminal;

    /**
     * @Assert\NotBlank()
     */
    public $flightNumber;


    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
    }


    public function setDateOfArrival(\DateTime $dateOfArrival = null)
    {
        $this->dateOfArrival = $dateOfArrival;
    }

    public function setAirport($airport)
    {
        $this->airport = $airport;
    }

    public function setTerminal($terminal)
    {
        $this->terminal = $terminal;
    }

    public function setFlightNumber($flightNumber)
    {
        $this->flightNumber = $flightNumber;
    }


}
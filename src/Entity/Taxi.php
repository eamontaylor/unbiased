<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\Constraints as TaxiAssert;

/**
 * @ORM\Entity
 * @ORM\Table(name="taxi")
 */

class Taxi
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    public $fullName;


    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    public $mobileNumber;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    public $dateOfArrival;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    public $airport;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    public $terminal;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @TaxiAssert\ContainsFlightCode
     */
    public $flightNumber;

    public function getFullName()
    {
        return $this->fullName;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }


    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
    }

    public function getDateOfArrival()
    {
        return $this->dateOfArrival;
    }

    public function setDateOfArrival(\DateTime $dateOfArrival = null)
    {
        $this->dateOfArrival = $dateOfArrival;
    }

    public function getAirport()
    {
        return $this->airport;
    }

    public function setAirport($airport)
    {
        $this->airport = $airport;
    }

    public function getTerminal()
    {
        return $this->terminal;
    }

    public function setTerminal($terminal)
    {
        $this->terminal = $terminal;
    }

    public function getFlightNumber()
    {
        return $this->flightNumber;
    }

    public function setFlightNumber($flightNumber)
    {
        $this->flightNumber = $flightNumber;
    }


}
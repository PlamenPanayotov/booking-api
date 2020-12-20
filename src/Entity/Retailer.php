<?php

namespace App\Entity;

use App\Repository\RetailerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RetailerRepository::class)
 */
class Retailer extends User
{

    public function __construct($email, $firstName, $lastName, $birthDate)
    {
        parent::__construct($email, $firstName, $lastName, $birthDate);
    }
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dealername;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dealernumber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDealername(): ?string
    {
        return $this->dealername;
    }

    public function setDealername(string $dealername): self
    {
        $this->dealername = $dealername;

        return $this;
    }

    public function getDealernumber(): ?string
    {
        return $this->dealernumber;
    }

    public function setDealernumber(string $dealernumber): self
    {
        $this->dealernumber = $dealernumber;

        return $this;
    }
}

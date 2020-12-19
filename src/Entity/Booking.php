<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookingRepository::class)
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uuid;

    /**
     * @ORM\Column(type="datetime")
     */
    private $orderedStartTime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $orderedEndTime;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $recordedStartTime;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $recorderEndTime;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $canceled;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getOrderedStartTime(): ?\DateTimeInterface
    {
        return $this->orderedStartTime;
    }

    public function setOrderedStartTime(\DateTimeInterface $orderedStartTime): self
    {
        $this->orderedStartTime = $orderedStartTime;

        return $this;
    }

    public function getOrderedEndTime(): ?\DateTimeInterface
    {
        return $this->orderedEndTime;
    }

    public function setOrderedEndTime(\DateTimeInterface $orderedEndTime): self
    {
        $this->orderedEndTime = $orderedEndTime;

        return $this;
    }

    public function getRecordedStartTime(): ?\DateTimeInterface
    {
        return $this->recordedStartTime;
    }

    public function setRecordedStartTime(?\DateTimeInterface $recordedStartTime): self
    {
        $this->recordedStartTime = $recordedStartTime;

        return $this;
    }

    public function getRecorderEndTime(): ?\DateTimeInterface
    {
        return $this->recorderEndTime;
    }

    public function setRecorderEndTime(?\DateTimeInterface $recorderEndTime): self
    {
        $this->recorderEndTime = $recorderEndTime;

        return $this;
    }

    public function getCanceled(): ?\DateTimeInterface
    {
        return $this->canceled;
    }

    public function setCanceled(?\DateTimeInterface $canceled): self
    {
        $this->canceled = $canceled;

        return $this;
    }
}

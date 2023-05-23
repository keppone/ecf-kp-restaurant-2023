<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScheduleRepository::class)]
class Schedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $startServiceNoon = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $endServiceNoon = null;

    #[ORM\Column]
    private ?int $numberMaxNoon = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $startServiceNight = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $endServiceNight = null;

    #[ORM\Column]
    private ?int $numberMaxNight = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getStartServiceNoon(): ?\DateTimeInterface
    {
        return $this->startServiceNoon;
    }

    public function setStartServiceNoon(?\DateTimeInterface $startServiceNoon): self
    {
        $this->startServiceNoon = $startServiceNoon;

        return $this;
    }

    public function getEndServiceNoon(): ?\DateTimeInterface
    {
        return $this->endServiceNoon;
    }

    public function setEndServiceNoon(?\DateTimeInterface $endServiceNoon): self
    {
        $this->endServiceNoon = $endServiceNoon;

        return $this;
    }

    public function getNumberMaxNoon(): ?int
    {
        return $this->numberMaxNoon;
    }

    public function setNumberMaxNoon(int $numberMaxNoon): self
    {
        $this->numberMaxNoon = $numberMaxNoon;

        return $this;
    }

    public function getStartServiceNight(): ?\DateTimeInterface
    {
        return $this->startServiceNight;
    }

    public function setStartServiceNight(?\DateTimeInterface $startServiceNight): self
    {
        $this->startServiceNight = $startServiceNight;

        return $this;
    }

    public function getEndServiceNight(): ?\DateTimeInterface
    {
        return $this->endServiceNight;
    }

    public function setEndServiceNight(?\DateTimeInterface $endServiceNight): self
    {
        $this->endServiceNight = $endServiceNight;

        return $this;
    }

    public function getNumberMaxNight(): ?int
    {
        return $this->numberMaxNight;
    }

    public function setNumberMaxNight(int $numberMaxNight): self
    {
        $this->numberMaxNight = $numberMaxNight;

        return $this;
    }
}

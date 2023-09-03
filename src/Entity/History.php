<?php

namespace App\Entity;

use App\Repository\HistoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoryRepository::class)]
class History
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $firstInValue = null;

    #[ORM\Column]
    private ?int $secondInValue = null;

    #[ORM\Column(nullable: true)]
    private ?int $firstOutValue = null;

    #[ORM\Column(nullable: true)]
    private ?int $secondOutValue = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateOfCreation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateOfUpdate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstInValue(): ?int
    {
        return $this->firstInValue;
    }

    public function setFirstInValue(int $firstInValue): static
    {
        $this->firstInValue = $firstInValue;

        return $this;
    }

    public function getSecondInValue(): ?int
    {
        return $this->secondInValue;
    }

    public function setSecondInValue(int $secondInValue): static
    {
        $this->secondInValue = $secondInValue;

        return $this;
    }

    public function getFirstOutValue(): ?int
    {
        return $this->firstOutValue;
    }

    public function setFirstOutValue(?int $firstOutValue): static
    {
        $this->firstOutValue = $firstOutValue;

        return $this;
    }

    public function getSecondOutValue(): ?int
    {
        return $this->secondOutValue;
    }

    public function setSecondOutValue(?int $secondOutValue): static
    {
        $this->secondOutValue = $secondOutValue;

        return $this;
    }

    public function getDateOfCreation(): ?\DateTimeInterface
    {
        return $this->dateOfCreation;
    }

    public function setDateOfCreation(?\DateTimeInterface $dateOfCreation): static
    {
        $this->dateOfCreation = $dateOfCreation;

        return $this;
    }

    public function getDateOfUpdate(): ?\DateTimeInterface
    {
        return $this->dateOfUpdate;
    }

    public function setDateOfUpdate(?\DateTimeInterface $dateOfUpdate): static
    {
        $this->dateOfUpdate = $dateOfUpdate;

        return $this;
    }
}

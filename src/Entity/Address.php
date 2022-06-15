<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $street;

    #[ORM\Column(type: 'integer', length: 5)]
    private $house_number;

    #[ORM\Column(type: 'string', length: 5, nullable: true)]
    private $house_number_add;

    #[ORM\Column(type: 'string', length: 6)]
    private $postal;

    #[ORM\OneToOne(targetEntity: City::class)]
    private $city;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getHouseNumber(): ?int
    {
        return $this->house_number;
    }

    public function setHouseNumber(int $house_number): self
    {
        $this->house_number = $house_number;

        return $this;
    }

    public function getHouseNumberAdd(): ?string
    {
        return $this->house_number_add;
    }

    public function setHouseNumberAdd(string $house_number_add): self
    {
        $this->house_number_add = $house_number_add;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostal()
    {
        return $this->postal;
    }

    /**
     * @param mixed $postal
     */
    public function setPostal($postal): void
    {
        $this->postal = $postal;
    }

    public function __toString(): string
    {
        return "$this->street $this->house_number," . ($this->postal ?? "") . " $this->city";
    }


}

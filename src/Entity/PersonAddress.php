<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Table(name="person_address", indexes={@ORM\Index(name="person_address_FK", columns={"person_id"})})
 * @ORM\Entity()
 */
class PersonAddress
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"orders","person"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addressLine1;

    /**
     * @Groups({"orders","person"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addressLine2;

    /**
     * @Groups({"orders","person"})
     * @ORM\Column(type="string", length=150)
     */
    private $city;

    /**
     * @Groups({"orders","person"})
     * @ORM\Column(type="string", length=4)
     */
    private $state;

    /**
     * @Groups({"orders","person"})
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $country;

    /**
     * @Groups({"orders","person"})
     * @ORM\Column(type="string", length=10)
     */
    private $zipCode;
    /**
     * @Groups({"orders","person"})
     * @ORM\Column(type="string", length=50,columnDefinition="ENUM('Billing', 'Shipping')")
     */
    private $type;

    /**
     * @var \Person
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     * })
     */
    private $person;

    public function getId()
    {
        return $this->id;
    }

    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    public function setAddressLine1(?string $AddressLine1): self
    {
        $this->addressLine1 = $AddressLine1;

        return $this;
    }


    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function setAddressLine2(?string $AddressLine2): self
    {
        $this->addressLine2 = $AddressLine2;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): self
    {
        $this->person = $person;

        return $this;
    }




}

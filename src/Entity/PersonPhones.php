<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="person_phones", indexes={@ORM\Index(name="person_phones_FK", columns={"person_id"})})
 * @ORM\Entity()
 */
class PersonPhones
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", length=1, nullable=false)
     */
    private $phonetype;

    /**
     * @ORM\Column(type="integer", length=3, nullable=true)
     */
    private $countryCode;

    /**
     * @ORM\Column(type="integer", length=3,nullable=false)
     */
    private $areaCode;

    /**
     * @ORM\Column(type="string", length=100,nullable=false)
     */
    private $number;

    /**
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

    public function getPhonetype(): ?int
    {
        return $this->phonetype;
    }

    public function setPhonetype(int $phonetype): self
    {
        $this->phonetype = $phonetype;

        return $this;
    }

    public function getCountryCode(): ?int
    {
        return $this->countryCode;
    }

    public function setCountryCode(?int $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getAreaCode(): ?int
    {
        return $this->areaCode;
    }

    public function setAreaCode(int $areaCode): self
    {
        $this->areaCode = $areaCode;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
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

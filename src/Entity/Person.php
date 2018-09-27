<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(normalizationContext={"groups"={"person","orders"}},
 *     denormalizationContext={"groups"={"person","orders"}}))
 * @ORM\Table(name="orders_person", indexes={@ORM\Index(name="person_orders_FK", columns={"orders_id"})})
 * @ORM\Entity()
 */
class Person
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"orders","person"})
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @Groups({"orders","person"})
     * @ORM\Column(type="string", length=500)
     */
    private $name;

    /**
     * @Groups({"orders","person"})
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $birthDate;

    /**
     * @Groups({"orders","person"})
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $email;
    /**
     * @Groups({"orders","person"})
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $document;


    /**
     * @Groups({"orders","person"})
     * @ORM\Column(type="string", length=1,columnDefinition="ENUM('M', 'F')")
     */
    private $gender;
    /**
     * @var \Orders
     *
     * @ORM\ManyToOne(targetEntity="Orders",inversedBy="person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="orders_id", referencedColumnName="id")
     * })
     */
    private $orders;

    /**
     * @Groups({"orders","person"})
     * @ORM\OneToMany(targetEntity="App\Entity\PersonAddress", mappedBy="person", cascade={"persist"})
     */
    protected $personAddress;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PersonPhones", mappedBy="person")
     */
    protected $personPhones;

    public function __construct()
    {
        $this->personAddress = new ArrayCollection();
        $this->personPhones = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $Name): self
    {
        $this->name = $Name;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTimeInterface $BirthDate): self
    {
        $this->birthDate = $BirthDate;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $Email): self
    {
        $this->email = $Email;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $Gender): self
    {
        $this->gender = $Gender;

        return $this;
    }
    public function getDocument(): ?string
    {
        return $this->document;
    }

    public function setDocument(string $Document): self
    {
        $this->document = $Document;

        return $this;
    }

    public function getOrders(): ?Orders
    {
        return $this->orders;
    }

    public function setOrders(?Orders $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * @return Collection|PersonAddress[]
     */
    public function getPersonAddress(): Collection
    {
        return $this->personAddress;
    }

    public function addPersonAddress(PersonAddress $personAddress): self
    {
        if (!$this->personAddress->contains($personAddress)) {
            $this->personAddress[] = $personAddress;
            $personAddress->setPerson($this);
        }

        return $this;
    }

    public function removePersonAddress(PersonAddress $personAddress): self
    {
        if ($this->personAddress->contains($personAddress)) {
            $this->personAddress->removeElement($personAddress);
            // set the owning side to null (unless already changed)
            if ($personAddress->getPerson() === $this) {
                $personAddress->setPerson(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PersonPhones[]
     */
    public function getPersonPhones(): Collection
    {
        return $this->personPhones;
    }

    public function addPersonPhone(PersonPhones $personPhone): self
    {
        if (!$this->personPhones->contains($personPhone)) {
            $this->personPhones[] = $personPhone;
            $personPhone->setPerson($this);
        }

        return $this;
    }

    public function removePersonPhone(PersonPhones $personPhone): self
    {
        if ($this->personPhones->contains($personPhone)) {
            $this->personPhones->removeElement($personPhone);
            // set the owning side to null (unless already changed)
            if ($personPhone->getPerson() === $this) {
                $personPhone->setPerson(null);
            }
        }

        return $this;
    }


}

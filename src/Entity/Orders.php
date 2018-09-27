<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Orders test
 * @ApiResource(normalizationContext={"groups"={"orders"}},
 *     denormalizationContext={"groups"={"orders"}}))
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity
 */
class Orders
{
    /**
     * @var int
     * @Groups({"orders"})
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     * @Groups({"orders"})
     * @ORM\Column(name="create_at", type="datetime", nullable=false)
     */
    private $createAt;
    /**
     * @var \DateTime
     * @Groups({"orders"})
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var int|null
     * @Groups({"orders"})
     * @ORM\Column(name="order_id", type="integer", nullable=true)
     */
    private $orderId;

    /**
     * @var string|null Order originating IP address
     * @Groups({"orders"})
     * @Assert\NotBlank
     * @ORM\Column(name="ip", type="string", length=100, nullable=true)
     */
    private $ip;

    /**
     *
     * @Groups({"orders"})
     * @ORM\Column(name="total_shipping",type="decimal", precision=19, scale=4,nullable=true)
     */
    private $totalShipping;

    /**
     * @Groups({"orders"})
     * @ORM\Column(name="total_order",type="decimal", precision=19, scale=4,nullable=true)
     */
    private $totalOrder;

    /**
     * @var string|null
     * @Groups({"orders"})
     * @ORM\Column(name="currency", type="string", length=10, nullable=true)
     */
    private $currency;

    /**
     * @var string|null
     * @Groups({"orders"})
     *
     * @ORM\Column(name="module", type="string", length=100, nullable=true)
     */
    private $module;

    /**
     * @var string|null
     * @Groups({"orders"})
     *
     * @ORM\Column(name="extra", type="string", length=100, nullable=true)
     */
    private $extra;

    /**
     * @Groups({"orders"})
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @Groups({"orders"})
     * @var string|null
     *
     * @ORM\Column(name="current_status", type="string", length=255, nullable=true)
     */
    private $currentStatus;
    /**
     * @Groups({"orders"})
     * @var string|null
     *
     * @ORM\Column(name="session_id", type="string", length=255, nullable=true)
     */
    private $sessionId;
    /**
     * @Groups({"orders"})
     * @var string|null
     *
     * @ORM\Column(name="device", type="string", length=150, nullable=true)
     */
    private $device;

    /**
     * @Groups({"orders"})
     * @var Payments[] payments for this order
     * @ORM\OneToMany(targetEntity="App\Entity\Payments", mappedBy="orders",cascade={"persist", "remove"})
     */
    protected $payments;

    /**
     * @Groups({"orders"})
     * @var OrdersItems[] items for this order
     * @ORM\OneToMany(targetEntity="App\Entity\OrdersItems", mappedBy="orders",cascade={"persist", "remove"})
     */
    protected $orderItems;

    /**
     * @Groups({"orders"})
     * @ORM\OneToOne(targetEntity="App\Entity\Person", mappedBy="orders", cascade={"persist"})
     */
    protected $person;

    /**
     * @Groups({"orders"})
     * @ORM\OneToMany(targetEntity="App\Entity\OrderMetadata", mappedBy="orders", cascade={"persist"})
     */
    protected $orderMetaData;

    /**
     * @Groups({"orders"})
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updatedAt;
    /**
     * @Groups({"orders"})
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $shippingType;

    public function __construct()
    {
        $this->payments = new ArrayCollection();
        $this->orderItems = new ArrayCollection();
        $this->orderMetaData = new ArrayCollection();
        $this->createAt = $this->createAt = new \DateTime();
        $this->updatedAt = $this->updatedAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function updateTime()
    {
        $this->createAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    public function setOrderId(?int $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCurrentStatus(): ?string
    {
        return $this->currentStatus;
    }

    public function setCurrentStatus(?string $currentStatus): self
    {
        $this->currentStatus = $currentStatus;

        return $this;
    }

    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    public function setSessionId(?string $sessionId): self
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    public function getDevice(): ?string
    {
        return $this->device;
    }

    public function setDevice(?string $device): self
    {
        $this->device = $device;

        return $this;
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

    public function getTotalShipping()
    {
        return $this->totalShipping;
    }

    public function setTotalShipping($totalShipping): self
    {
        $this->totalShipping = $totalShipping;

        return $this;
    }

    public function getTotalOrder()
    {
        return $this->totalOrder;
    }

    public function setTotalOrder($totalOrder): self
    {
        $this->totalOrder = $totalOrder;

        return $this;
    }

    public function getModule(): ?string
    {
        return $this->module;
    }

    public function setModule(?string $module): self
    {
        $this->module = $module;

        return $this;
    }

    public function getShippingType(): ?string
    {
        return $this->shippingType;
    }

    public function setShippingType(?string $ShippingType): self
    {
        $this->shippingType = $ShippingType;

        return $this;
    }

    /**
     * @return Collection|Payments[]
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function addPayment(Payments $payment): self
    {
        if (!$this->payments->contains($payment)) {
            $this->payments[] = $payment;
            $payment->setOrders($this);
        }

        return $this;
    }

    public function removePayment(Payments $payment): self
    {
        if ($this->payments->contains($payment)) {
            $this->payments->removeElement($payment);
            // set the owning side to null (unless already changed)
            if ($payment->getOrders() === $this) {
                $payment->setOrders(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|OrdersItems[]
     */
    public function getOrderItems(): Collection
    {
        return $this->orderItems;
    }

    public function addOrderItem(OrdersItems $orderItem): self
    {
        if (!$this->orderItems->contains($orderItem)) {
            $this->orderItems[] = $orderItem;
            $orderItem->setOrders($this);
        }

        return $this;
    }

    public function removeOrderItem(OrdersItems $orderItem): self
    {
        if ($this->orderItems->contains($orderItem)) {
            $this->orderItems->removeElement($orderItem);
            // set the owning side to null (unless already changed)
            if ($orderItem->getOrders() === $this) {
                $orderItem->setOrders(null);
            }
        }

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): self
    {
        $this->person = $person;

        // set (or unset) the owning side of the relation if necessary
        $newOrders = $person === null ? null : $this;
        if ($newOrders !== $person->getOrders()) {
            $person->setOrders($newOrders);
        }

        return $this;
    }

    /**
     * @return Collection|OrderMetadata[]
     */
    public function getOrderMetaData(): Collection
    {
        return $this->orderMetaData;
    }

    public function addOrderMetaData(OrderMetadata $orderMetaData): self
    {
        if (!$this->orderMetaData->contains($orderMetaData)) {
            $this->orderMetaData[] = $orderMetaData;
            $orderMetaData->setOrders($this);
        }

        return $this;
    }

    public function removeOrderMetaData(OrderMetadata $orderMetaData): self
    {
        if ($this->orderMetaData->contains($orderMetaData)) {
            $this->orderMetaData->removeElement($orderMetaData);
            // set the owning side to null (unless already changed)
            if ($orderMetaData->getOrders() === $this) {
                $orderMetaData->setOrders(null);
            }
        }

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function getExtra(): ?string
    {
        return $this->extra;
    }

    public function setExtra(?string $extra): self
    {
        $this->extra = $extra;

        return $this;
    }


}

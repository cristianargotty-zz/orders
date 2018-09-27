<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Payments
 * @ApiResource
 * @ORM\Table(name="payments", indexes={@ORM\Index(name="payments_orders_FK", columns={"orders_id"})})
 * @ORM\Entity
 */
class Payments
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @Groups({"orders"})
     * @ORM\Column(name="amount",type="decimal", precision=19, scale=4,nullable=true)
     */
    private $amount;

    /**
     * @Groups({"orders"})
     * @var string|null
     *
     * @ORM\Column(name="card_type", type="string", length=100, nullable=true)
     */
    private $cardType;

    /**
     * @Groups({"orders"})
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @Groups({"orders"})
     * @var string|null
     *
     * @ORM\Column(name="card_bin", type="string", length=100, nullable=true)
     */
    private $cardBin;

    /**
     * @Groups({"orders"})
     * @var string|null
     *
     * @ORM\Column(name="card_number", type="string", length=100, nullable=true)
     */
    private $cardNumber;

    /**
     * @Groups({"orders"})
     * @var string|null
     *
     * @ORM\Column(name="card_end_number", type="string", length=100, nullable=true)
     */
    private $cardEndNumber;

    /**
     * @Groups({"orders"})
     * @var string|null
     *
     * @ORM\Column(name="card_holder_name", type="string", length=100, nullable=true)
     */
    private $cardHolderName;
    /**
     * @Groups({"orders"})
     * @var string|null
     *
     * @ORM\Column(name="card_expiration_date", type="string", length=100, nullable=true)
     */
    private $cardExpirationDate;

    /**
     * @Groups({"orders"})
     * @var string|null
     *
     * @ORM\Column(name="payment_type_id", type="string", length=100, nullable=true)
     */
    private $paymentTypeId;

    /**
     * @var \Orders
     *
     * @ORM\ManyToOne(targetEntity="Orders",inversedBy="payments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="orders_id", referencedColumnName="id")
     * })
     */
    private $orders;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }


    public function setAmount(?string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCardType(): ?string
    {
        return $this->cardType;
    }

    public function setCardType(?string $cardType): self
    {
        $this->cardType = $cardType;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCardBin(): ?string
    {
        return $this->cardBin;
    }

    public function setCardBin(?string $cardBin): self
    {
        $this->cardBin = $cardBin;

        return $this;
    }

    public function getCardEndNumber(): ?string
    {
        return $this->cardEndNumber;
    }

    public function setCardEndNumber(?string $cardEndNumber): self
    {
        $this->cardEndNumber = $cardEndNumber;

        return $this;
    }

    public function getCardHolderName(): ?string
    {
        return $this->cardHolderName;
    }

    public function setCardHolderName(?string $cardHolderName): self
    {
        $this->cardHolderName = $cardHolderName;

        return $this;
    }

    public function getPaymentTypeId(): ?string
    {
        return $this->paymentTypeId;
    }

    public function setPaymentTypeId(?string $paymentTypeId): self
    {
        $this->paymentTypeId = $paymentTypeId;

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

    public function getCardNumber(): ?string
    {
        return $this->cardNumber;
    }

    public function setCardNumber(?string $cardNumber): self
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    public function getCardExpirationDate(): ?string
    {
        return $this->cardExpirationDate;
    }

    public function setCardExpirationDate(?string $cardExpirationDate): self
    {
        $this->cardExpirationDate = $cardExpirationDate;

        return $this;
    }




}

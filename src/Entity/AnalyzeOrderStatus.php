<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="analyze_order_status", indexes={@ORM\Index(name="status_orders_FK", columns={"orders_id"})})
 * @ORM\Entity()
 */
class AnalyzeOrderStatus
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="status",type="string", length=100,columnDefinition="ENUM('pending', 'processed')")
     */
    private $status;

    /**
     * @ORM\Column(name="score",type="decimal", precision=19, scale=2)
     */
    private $score;

    /**
     * @ORM\Column(name="external_status",type="string", length=100)
     */
    private $externalStatus;

    /**
     * @ORM\Column(name="transactionId",type="string", length=100)
     */
    private $transactionId;

    /**
     * @var \Orders
     *
     * @ORM\ManyToOne(targetEntity="Orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="orders_id", referencedColumnName="id")
     * })
     */
    private $orders;


    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updatedAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->updatedAt = $this->createdAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function updateTime()
    {
        $this->updatedAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getExternalStatus(): ?string
    {
        return $this->externalStatus;
    }

    public function setExternalStatus(string $externalStatus): self
    {
        $this->externalStatus = $externalStatus;

        return $this;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function setTransactionId(string $transactionId): self
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

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

}
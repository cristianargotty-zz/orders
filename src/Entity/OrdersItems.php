<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource
 * @ORM\Table(name="orders_items", indexes={@ORM\Index(name="items_orders_FK", columns={"orders_id"})})
 * @ORM\Entity
 */
class OrdersItems
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"orders"})
     * @ORM\Column(name="item_code",type="string", length=100)
     */
    private $itemCode;

    /**
     * @Groups({"orders"})
     * @ORM\Column(name="name",type="string", length=150)
     */
    private $name;

    /**
     * @Groups({"orders"})
     * @ORM\Column(name="price",type="decimal", precision=19, scale=4)
     */
    private $price;

    /**
     * @Groups({"orders"})
     * @ORM\Column(name="qty",type="integer")
     */
    private $qty;

    /**
     * @Groups({"orders"})
     * @ORM\Column(name="gift",type="integer", nullable=true)
     */
    private $gift;

    /**
     * @Groups({"orders"})
     * @ORM\Column(name="category_id",type="integer", nullable=true)
     */
    private $categoryId;

    /**
     * @Groups({"orders"})
     * @ORM\Column(name="category_name",type="string", length=200, nullable=true)
     */
    private $categoryName;
    /**
     * @var \Orders
     *
     * @ORM\ManyToOne(targetEntity="Orders",inversedBy="orderItems")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="orders_id", referencedColumnName="id")
     * })
     */
    private $orders;

    public function getId()
    {
        return $this->id;
    }

    public function getItemCode(): ?string
    {
        return $this->itemCode;
    }

    public function setItemCode(string $itemCode): self
    {
        $this->itemCode = $itemCode;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }



    public function getQty(): ?int
    {
        return $this->qty;
    }

    public function setQty(int $qty): self
    {
        $this->qty = $qty;

        return $this;
    }

    public function getGift(): ?int
    {
        return $this->gift;
    }

    public function setGift(?int $gift): self
    {
        $this->gift = $gift;

        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(?int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    public function setCategoryName(?string $category_name): self
    {
        $this->categoryName = $category_name;

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

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): self
    {
        $this->price = $price;

        return $this;
    }
}

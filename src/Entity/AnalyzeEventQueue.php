<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of AnalyzeEventQueue
 *
 * @author cristian Reyes <cristian.reyes at dafiti.com.ar>
 */

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table()
 */
class AnalyzeEventQueue
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\ManyToOne(targetEntity="Orders")
     */
    protected $orders;


    /**
     * @ORM\Column(name="order_status", type="string", nullable=false)
     */
    protected $orderStatus;


    /**
     * @ORM\Column(name="retry", type="integer", nullable=false)
     */
    protected $retry;

    /**
     * @ORM\Column(name="status", type="string")
     */
    protected $status;

    /**
     * @ORM\Column(name="action_request", type="string", nullable=false)
     */
    protected $actionRequest;

    /**
     * @ORM\Column(name="message", type="text", nullable=true)
     */
    protected $message;


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

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set retry
     *
     * @param integer $retry
     *
     * @return AnalyzeEventQueue
     */
    public function setRetry($retry)
    {
        $this->retry = $retry;

        return $this;
    }

    /**
     * Get retry
     *
     * @return integer
     */
    public function getRetry()
    {
        return $this->retry;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return AnalyzeEventQueue
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return AnalyzeEventQueue
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return AnalyzeEventQueue
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return AnalyzeEventQueue
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set orders
     *
     * @param \App\Entity\Orders $orders
     *
     * @return AnalyzeEventQueue
     */
    public function setOrders(\App\Entity\Orders $orders = null)
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * Get orders
     *
     * @return \App\Entity\Orders
     */
    public function getOrders()
    {
        return $this->orders;
    }


    /**
     * Set orderStatus
     *
     * @param string $orderStatus
     *
     * @return AnalyzeEventQueue
     */
    public function setOrderStatus($orderStatus)
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }

    /**
     * Get orderStatus
     *
     * @return string
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }


    /**
     * Set actionRequest
     *
     * @param string $actionRequest
     *
     * @return AnalyzeEventQueue
     */
    public function setActionRequest($actionRequest)
    {
        $this->actionRequest = $actionRequest;

        return $this;
    }

    /**
     * Get actionRequest
     *
     * @return string
     */
    public function getActionRequest()
    {
        return $this->actionRequest;
    }


}

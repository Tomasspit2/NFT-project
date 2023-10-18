<?php

namespace App\Entity;

use App\Repository\OrderStatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderStatusRepository::class)]
class OrderStatus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'orderStatus', targetEntity: order::class)]
    private Collection $orderstatus;

    public function __construct()
    {
        $this->orderstatus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, order>
     */
    public function getOrderstatus(): Collection
    {
        return $this->orderstatus;
    }

    public function addOrderstatus(order $orderstatus): static
    {
        if (!$this->orderstatus->contains($orderstatus)) {
            $this->orderstatus->add($orderstatus);
            $orderstatus->setOrderStatus($this);
        }

        return $this;
    }

    public function removeOrderstatus(order $orderstatus): static
    {
        if ($this->orderstatus->removeElement($orderstatus)) {
            // set the owning side to null (unless already changed)
            if ($orderstatus->getOrderStatus() === $this) {
                $orderstatus->setOrderStatus(null);
            }
        }

        return $this;
    }
}

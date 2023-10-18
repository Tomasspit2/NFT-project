<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: artwork::class)]
    private Collection $artwork;

    public function __construct()
    {
        $this->artwork = new ArrayCollection();
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
     * @return Collection<int, artwork>
     */
    public function getArtwork(): Collection
    {
        return $this->artwork;
    }

    public function addArtwork(artwork $artwork): static
    {
        if (!$this->artwork->contains($artwork)) {
            $this->artwork->add($artwork);
            $artwork->setCategory($this);
        }

        return $this;
    }

    public function removeArtwork(artwork $artwork): static
    {
        if ($this->artwork->removeElement($artwork)) {
            // set the owning side to null (unless already changed)
            if ($artwork->getCategory() === $this) {
                $artwork->setCategory(null);
            }
        }

        return $this;
    }
}

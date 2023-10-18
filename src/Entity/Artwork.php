<?php

namespace App\Entity;

use App\Repository\ArtworkRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtworkRepository::class)]
class Artwork
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $image_url = null;

    #[ORM\Column(length: 255)]
    private ?string $price = null;

    #[ORM\ManyToOne(inversedBy: 'artwork')]
    private ?User $UserArtwork = null;

    #[ORM\ManyToOne(inversedBy: 'artwork')]
    private ?Category $category = null;

    #[ORM\ManyToOne(inversedBy: 'artwork')]
    private ?Copyright $copyright = null;

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

    public function getImageUrl(): ?string
    {
        return $this->image_url;
    }

    public function setImageUrl(string $image_url): static
    {
        $this->image_url = $image_url;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getUserArtwork(): ?User
    {
        return $this->UserArtwork;
    }

    public function setUserArtwork(?User $UserArtwork): static
    {
        $this->UserArtwork = $UserArtwork;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getCopyright(): ?Copyright
    {
        return $this->copyright;
    }

    public function setCopyright(?Copyright $copyright): static
    {
        $this->copyright = $copyright;

        return $this;
    }
}

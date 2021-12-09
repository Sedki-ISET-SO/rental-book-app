<?php

namespace App\Entity;

use App\Repository\ListingAmenityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListingAmenityRepository::class)
 */
class ListingAmenity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Listing::class, inversedBy="listingAmenities")
     */
    private $listing;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?bool
    {
        return $this->name;
    }

    public function setName(bool $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getListing(): ?Listing
    {
        return $this->listing;
    }

    public function setListing(?Listing $listing): self
    {
        $this->listing = $listing;

        return $this;
    }
}

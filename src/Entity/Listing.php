<?php

namespace App\Entity;

use App\Repository\ListingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListingRepository::class)
 */
class Listing
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pictureUrl;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $beds;

    /**
     * @ORM\Column(type="integer")
     */
    private $guests;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="boolean")
     */
    private $petFriendlySpace;

    /**
     * @ORM\Column(type="boolean")
     */
    private $wifi;

    /**
     * @ORM\Column(type="boolean")
     */
    private $freeParking;

    /**
     * @ORM\Column(type="boolean")
     */
    private $pool;

    /**
     * @ORM\Column(type="boolean")
     */
    private $airConditioning;

    /**
     * @ORM\Column(type="boolean")
     */
    private $washer;

    /**
     * @ORM\Column(type="boolean")
     */
    private $tv;

    /**
     * @ORM\Column(type="datetime")
     */
    private $published;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="listings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPictureUrl(): ?string
    {
        return $this->pictureUrl;
    }

    public function setPictureUrl(string $pictureUrl): self
    {
        $this->pictureUrl = $pictureUrl;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getBeds(): ?int
    {
        return $this->beds;
    }

    public function setBeds(int $beds): self
    {
        $this->beds = $beds;

        return $this;
    }

    public function getGuests(): ?int
    {
        return $this->guests;
    }

    public function setGuests(int $guests): self
    {
        $this->guests = $guests;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getPetFriendlySpace(): ?bool
    {
        return $this->petFriendlySpace;
    }

    public function setPetFriendlySpace(bool $petFriendlySpace): self
    {
        $this->petFriendlySpace = $petFriendlySpace;

        return $this;
    }

    public function getWifi(): ?bool
    {
        return $this->wifi;
    }

    public function setWifi(bool $wifi): self
    {
        $this->wifi = $wifi;

        return $this;
    }

    public function getFreeParking(): ?bool
    {
        return $this->freeParking;
    }

    public function setFreeParking(bool $freeParking): self
    {
        $this->freeParking = $freeParking;

        return $this;
    }

    public function getPool(): ?bool
    {
        return $this->pool;
    }

    public function setPool(bool $pool): self
    {
        $this->pool = $pool;

        return $this;
    }

    public function getAirConditioning(): ?bool
    {
        return $this->airConditioning;
    }

    public function setAirConditioning(bool $airConditioning): self
    {
        $this->airConditioning = $airConditioning;

        return $this;
    }

    public function getWasher(): ?bool
    {
        return $this->washer;
    }

    public function setWasher(bool $washer): self
    {
        $this->washer = $washer;

        return $this;
    }

    public function getTv(): ?bool
    {
        return $this->tv;
    }

    public function setTv(bool $tv): self
    {
        $this->tv = $tv;

        return $this;
    }

    public function getPublished(): ?\DateTimeInterface
    {
        return $this->published;
    }

    public function setPublished(\DateTimeInterface $published): self
    {
        $this->published = $published;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}

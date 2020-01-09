<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A room or other accommodation that can facilitate people.
 *
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}, "enable_max_depth"=true},
 *     denormalizationContext={"groups"={"write"}, "enable_max_depth"=true}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\AccommodationRepository")
 */
class Accommodation
{
    /**
     * @var UuidInterface
     *
     * @Groups({"read"})
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @var string The name of this accommodation is displayed as a title to end users
     *
     * @example My Accommodation
     *
     * @Groups({"read","write"})
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull
     * @Assert\Length(
     *     max = 255
     * )
     */
    private $name;

    /**
     * @var string The description of this accommodation is displayed to end users as additional information
     *
     * @example This is the best accommodation ever
     *
     * @Groups({"read","write"})
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(
     *     max = 2550
     * )
     */
    private $description;

    /**
     * @var string The category this accomodation falls into
     *
     * @example Restaurant
     *
     * @Groups({"read","write"})
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     max = 255
     * )
     * @Assert\NotNull
     */
    private $accommodationCategory;

    /**
     * @var string The floor surface area of the accommodation
     *
     * @example 25 m^2
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     max=255
     * )
     * @Assert\NotNull
     */
    private $floorSize;

    /**
     * @var bool Answers the question if pets are allowed or not
     *
     * @example true
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="boolean")
     * @Assert\NotNull
     */
    private $petsAllowed;

    /**
     * @var bool Answers the question if the accomodation is wheelchair accessible
     *
     * @example true
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="boolean")
     * @Assert\NotNull
     */
    private $wheelchairAccessible;

    /**
     * @var int The number of available toilets at the accommodation
     *
     * @example 10
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     */
    private $numberOfBathroomsTotal;

    /**
     * @var int The floor level the accommodation is situated on
     *
     * @example 10
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     */
    private $floorLevel;

    /**
     * @var int The maximum number of attendees the accommodation can facilitate
     *
     * @example 10
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     */
    private $maximumAttendeeCapacity;

    /**
     * @var string The product this accommodation is related to
     *
     * @example My Accommodation
     *
     * @Groups({"read","write"})
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull
     * @Assert\Length(
     *     max = 255
     * )
     */
    private $product;

    /**
     * @var array|string[] Resources available in this accommodation
     *
     * @example My Accommodation
     *
     * @Groups({"read","write"})
     * @ORM\Column(type="array", length=255)
     * @Assert\NotNull
     */
    private $resources = [];

    /**
     * @Groups({"read","write"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Place", inversedBy="accommodations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $place;

    public function getId(): ?string
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAccommodationCategory(): ?string
    {
        return $this->accommodationCategory;
    }

    public function setAccommodationCategory(string $accommodationCategory): self
    {
        $this->accommodationCategory = $accommodationCategory;

        return $this;
    }

    public function getFloorSize(): ?string
    {
        return $this->floorSize;
    }

    public function setFloorSize(string $floorSize): self
    {
        $this->floorSize = $floorSize;

        return $this;
    }

    public function getPermittedUsage(): ?string
    {
        return $this->permittedUsage;
    }

    public function setPermittedUsage(string $permittedUsage): self
    {
        $this->permittedUsage = $permittedUsage;

        return $this;
    }

    public function getPetsAllowed(): ?bool
    {
        return $this->petsAllowed;
    }

    public function setPetsAllowed(bool $petsAllowed): self
    {
        $this->petsAllowed = $petsAllowed;

        return $this;
    }

    public function getWheelchairAccessible(): ?bool
    {
        return $this->wheelchairAccessible;
    }

    public function setWheelchairAccessible(bool $wheelchairAccessible): self
    {
        $this->wheelchairAccessible = $wheelchairAccessible;

        return $this;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function setProduct(?string $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getResources(): ?array
    {
        return $this->resources;
    }

    public function setResources(?array $resources): self
    {
        $this->resources = $resources;

        return $this;
    }

    public function getNumberOfBathroomsTotal(): ?int
    {
        return $this->numberOfBathroomsTotal;
    }

    public function setNumberOfBathroomsTotal(int $numberOfBathroomsTotal): self
    {
        $this->numberOfBathroomsTotal = $numberOfBathroomsTotal;

        return $this;
    }

    public function getFloorLevel(): ?int
    {
        return $this->floorLevel;
    }

    public function setFloorLevel(int $floorLevel): self
    {
        $this->floorLevel = $floorLevel;

        return $this;
    }

    public function getMaximumAttendeeCapacity(): ?int
    {
        return $this->maximumAttendeeCapacity;
    }

    public function setMaximumAttendeeCapacity(int $maximumAttendeeCapacity): self
    {
        $this->maximumAttendeeCapacity = $maximumAttendeeCapacity;

        return $this;
    }

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): self
    {
        $this->place = $place;

        return $this;
    }
}

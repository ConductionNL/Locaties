<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * A room or other accommodation that can facilitate people.
 *
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}, "enable_max_depth"=true},
 *     denormalizationContext={"groups"={"write"}, "enable_max_depth"=true},
 *     itemOperations={
 *          "get",
 *          "put",
 *          "delete",
 *          "get_change_logs"={
 *              "path"="/accomodations/{id}/change_log",
 *              "method"="get",
 *              "swagger_context" = {
 *                  "summary"="Changelogs",
 *                  "description"="Gets al the change logs for this resource"
 *              }
 *          },
 *          "get_audit_trail"={
 *              "path"="/accomodations/{id}/audit_trail",
 *              "method"="get",
 *              "swagger_context" = {
 *                  "summary"="Audittrail",
 *                  "description"="Gets the audit trail for this resource"
 *              }
 *          }
 *     },
 * )
 * @ORM\Entity(repositoryClass="App\Repository\AccommodationRepository")
 * @Gedmo\Loggable(logEntryClass="App\Entity\ChangeLog")
 *
 * @ApiFilter(BooleanFilter::class)
 * @ApiFilter(OrderFilter::class)
 * @ApiFilter(DateFilter::class, strategy=DateFilter::EXCLUDE_NULL)
 * @ApiFilter(SearchFilter::class)
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
     * @example My Accommodation
     *
     * @Gedmo\Versioned
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
     * @example This is the best accommodation ever
     *
     * @Gedmo\Versioned
     * @Groups({"read","write"})
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(
     *     max = 2550
     * )
     */
    private $description;

    /**
     * @var string The category this accomodation falls into
     * @example Restaurant
     *
     * @Gedmo\Versioned
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
     * @example 25 m^2
     *
     * @Gedmo\Versioned
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
     * @example true
     *
     * @Gedmo\Versioned
     * @Groups({"read", "write"})
     * @ORM\Column(type="boolean")
     * @Assert\NotNull
     */
    private $petsAllowed;

    /**
     * @var bool Answers the question if the accomodation is wheelchair accessible
     * @example true
     *
     * @Gedmo\Versioned
     * @Groups({"read", "write"})
     * @ORM\Column(type="boolean")
     * @Assert\NotNull
     */
    private $wheelchairAccessible;

    /**
     * @var int The number of available toilets at the accommodation
     * @example 10
     *
     * @Gedmo\Versioned
     * @Groups({"read", "write"})
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     */
    private $numberOfBathroomsTotal;

    /**
     * @var int The floor level the accommodation is situated on
     * @example 10
     *
     * @Gedmo\Versioned
     * @Groups({"read", "write"})
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     */
    private $floorLevel;

    /**
     * @var int The maximum number of attendees the accommodation can facilitate
     * @example 10
     *
     *
     * @Gedmo\Versioned
     * @Groups({"read", "write"})
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     */
    private $maximumAttendeeCapacity;

    /**
     * @var string The product this accommodation is related to
     * @example My Accommodation
     *
     * @Gedmo\Versioned
     * @Groups({"read","write"})
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull
     * @Assert\Length(
     *     max = 255
     * )
     */
    private $product;

    /**
     * @var Place The location this accommodation belongs to
     *
     * @Groups({"read","write"})
     * @MaxDepth(1)
     * @ORM\ManyToOne(targetEntity="App\Entity\Place", inversedBy="accommodations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $place;

    /**
     * @Groups({"read","write"})
     * @ORM\OneToMany(targetEntity="App\Entity\AccommodationProperty", mappedBy="accommodation")
     * @MaxDepth(1)
     */
    private $accommodationProperties;

    /**
     * @var Datetime $dateCreated The moment this resource was created
     *
     * @Groups({"read"})
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var Datetime $dateModified  The moment this resource last Modified
     *
     * @Groups({"read"})
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateModified;


    public function __construct()
    {
        $this->accommodationProperties = new ArrayCollection();
    }

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

    public function getDateCreated(): ?\DateTimeInterface
    {
    	return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {
    	$this->dateCreated= $dateCreated;

    	return $this;
    }

    public function getDateModified(): ?\DateTimeInterface
    {
    	return $this->dateModified;
    }

    public function setDateModified(\DateTimeInterface $dateModified): self
    {
    	$this->dateModified = $dateModified;

    	return $this;
    }

    /**
     * @return Collection|AccommodationProperty[]
     */
    public function getAccommodationProperties(): Collection
    {
        return $this->accommodationProperties;
    }

    public function addAccommodationProp(AccommodationProperty $accommodationProperty): self
    {
        if (!$this->accommodationProperties->contains($accommodationProperty)) {
            $this->accommodationProperties[] = $accommodationProperty;
            $accommodationProperty->setAccommodation($this);
        }

        return $this;
    }

    public function removeAccommodationProp(AccommodationProperty $accommodationProperty): self
    {
        if ($this->accommodationProperties->contains($accommodationProperty)) {
            $this->accommodationProperties->removeElement($accommodationProperty);
            // set the owning side to null (unless already changed)
            if ($accommodationProperty->getAccommodation() === $this) {
                $accommodationProperty->setAccommodation(null);
            }
        }

        return $this;
    }

}

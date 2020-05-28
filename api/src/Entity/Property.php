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
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}, "enable_max_depth"=true},
 *     denormalizationContext={"groups"={"write"}, "enable_max_depth"=true},
 *     itemOperations={
 *          "get",
 *          "put",
 *          "delete",
 *          "get_change_logs"={
 *              "path"="/resources/{id}/change_log",
 *              "method"="get",
 *              "swagger_context" = {
 *                  "summary"="Changelogs",
 *                  "description"="Gets al the change logs for this resource"
 *              }
 *          },
 *          "get_audit_trail"={
 *              "path"="/resources/{id}/audit_trail",
 *              "method"="get",
 *              "swagger_context" = {
 *                  "summary"="Audittrail",
 *                  "description"="Gets the audit trail for this resource"
 *              }
 *          }
 *     },
 * )
 * @ORM\Entity(repositoryClass="App\Repository\PropertyRepository")
 * @Gedmo\Loggable(logEntryClass="Conduction\CommonGroundBundle\Entity\ChangeLog")
 *
 * @ApiFilter(BooleanFilter::class)
 * @ApiFilter(OrderFilter::class)
 * @ApiFilter(DateFilter::class, strategy=DateFilter::EXCLUDE_NULL)
 * @ApiFilter(SearchFilter::class)
 */
class Property
{
    /**
     * @var UuidInterface The UUID identifier of this object
     *
     * @example e2984465-190a-4562-829e-a8cca81aa35d
     *
     * @Groups({"read"})
     * @Assert\Uuid
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @var string Property name
     *
     * @example Property name
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
     * @var string property description
     *
     * @example Property description
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
     * @var string key of property
     *
     * @example 4123
     *
     * @Gedmo\Versioned
     * @Groups({"read", "write"})
     * @Assert\NotNull
     * @Assert\Length(
     *   max = 200
     * )
     *
     * @ORM\Column(type="string", name="the_key",length=200, unique=true, nullable=false)
     */
    private $key;

    /**
     * @Groups({"read","write"})
     * @ORM\OneToMany(targetEntity="App\Entity\PlaceProperty", mappedBy="property")
     * @MaxDepth(1)
     */
    private $placeProperties;

    /**
     * @Groups({"read","write"})
     * @ORM\OneToMany(targetEntity="App\Entity\AccommodationProperty", mappedBy="property")
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
        $this->placeProperties = new ArrayCollection();
        $this->accommodationProperties = new ArrayCollection();
    }

    public function getId()
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

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(?string $key): self
    {
        $this->key = $key;

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
     * @return Collection|PlaceProperty[]
     */
    public function getPlaceProperties(): Collection
    {
        return $this->placeProperties;
    }

    public function addPlaceProperty(PlaceProperty $placeProperty): self
    {
        if (!$this->placeProperties->contains($placeProperty)) {
            $this->placeProperties[] = $placeProperty;
            $placeProperty->setProperty($this);
        }

        return $this;
    }

    public function removePlaceProperty(PlaceProperty $placeProperty): self
    {
        if ($this->placeProperties->contains($placeProperty)) {
            $this->placeProperties->removeElement($placeProperty);
            // set the owning side to null (unless already changed)
            if ($placeProperty->getProperty() === $this) {
                $placeProperty->setProperty(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AccommodationProperty[]
     */
    public function getAccommodationProperties(): Collection
    {
        return $this->accommodationProperties;
    }

    public function addAccommodationProperty(AccommodationProperty $accommodationProperty): self
    {
        if (!$this->accommodationProperties->contains($accommodationProperty)) {
            $this->accommodationProperties[] = $accommodationProperty;
            $accommodationProperty->setProperty($this);
        }

        return $this;
    }

    public function removeAccommodationProperty(AccommodationProperty $accommodationProperty): self
    {
        if ($this->accommodationProperties->contains($accommodationProperty)) {
            $this->accommodationProperties->removeElement($accommodationProperty);
            // set the owning side to null (unless already changed)
            if ($accommodationProperty->getProperty() === $this) {
                $accommodationProperty->setProperty(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PlaceRepository")
 */
class Place
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
     * @var string The name of this place is displayed as a title to end users
     *
     * @example My Place
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
     * @var string The description of this place is displayed to end users as additional information
     *
     * @example This is the best place ever
     *
     * @Groups({"read","write"})
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(
     *     max = 2550
     * )
     */
    private $description;

    /**
     * @var string Bagnummeraanduiding of this Address
     *
     * @example 0363200000218908
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=16, nullable=true)
     * @Assert\Length(
     *     max = 16
     * )
     */
    private $bagId;

    /**
     * @var string Website of this Place
     *
     * @example https://location.com
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255
     * )
     */
    private $url;

    /**
     * @var string Phone number of this Place
     *
     * @example +31 (0)26 355 7772
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255
     * )
     */
    private $telephone;

    /**
     * @var string Logo of this Place
     *
     * @example https://location.com/logo.svg
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255
     * )
     */
    private $logo;

    /**
     * @var string Photo of this Place
     *
     * @example https://location.com/photo.jpg
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255
     * )
     */
    private $photo;

    /**
     * @var string Map of this Place
     *
     * @example https://location.com/map.pdf
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255
     * )
     */
    private $hasMap;

    /**
     * @var boolean Answers the question if the place is publicly accessible
     * @example true
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="boolean")
     * @Assert\NotNull
     *
     */
    private $publicAccess;

    /**
     * @var boolean Answers the question if smoking is allowed in this place
     * @example true
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="boolean")
     * @Assert\NotNull
     */
    private $smokingAllowed;

    /**
     * @var DateTime the opening time of the location
     * @example 08:00
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="datetime")
     * @Assert\NotNull
     * @Assert\DateTime
     */
    private $openingTime;

    /**
     * @var DateTime the closing time of the location
     * @example 18:00
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="datetime")
     * @Assert\NotNull
     * @Assert\DateTime
     */
    private $closingTime;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Accommodation", mappedBy="place", orphanRemoval=true)
     */
    private $accommodations;

    public function __construct()
    {
        $this->accommodations = new ArrayCollection();
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

    public function getBagId(): ?string
    {
        return $this->bagId;
    }

    public function setBagId(string $bagId): self
    {
        $this->bagId = $bagId;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getHasMap(): ?string
    {
        return $this->hasMap;
    }

    public function setHasMap(?string $hasMap): self
    {
        $this->hasMap = $hasMap;

        return $this;
    }

    public function getPublicAccess(): ?bool
    {
        return $this->publicAccess;
    }

    public function setPublicAccess(bool $publicAccess): self
    {
        $this->publicAccess = $publicAccess;

        return $this;
    }

    public function getSmokingAllowed(): ?bool
    {
        return $this->smokingAllowed;
    }

    public function setSmokingAllowed(bool $smokingAllowed): self
    {
        $this->smokingAllowed = $smokingAllowed;

        return $this;
    }

    public function getOpeningTime(): ?\DateTimeInterface
    {
        return $this->openingTime;
    }

    public function setOpeningTime(\DateTimeInterface $openingTime): self
    {
        $this->openingTime = $openingTime;

        return $this;
    }

    public function getClosingTime(): ?\DateTimeInterface
    {
        return $this->closingTime;
    }

    public function setClosingTime(\DateTimeInterface $closingTime): self
    {
        $this->closingTime = $closingTime;

        return $this;
    }

    /**
     * @return Collection|Accommodation[]
     */
    public function getAccommodations(): Collection
    {
        return $this->accommodations;
    }

    public function addAccommodation(Accommodation $accommodation): self
    {
        if (!$this->accommodations->contains($accommodation)) {
            $this->accommodations[] = $accommodation;
            $accommodation->setPlace($this);
        }

        return $this;
    }

    public function removeAccommodation(Accommodation $accommodation): self
    {
        if ($this->accommodations->contains($accommodation)) {
            $this->accommodations->removeElement($accommodation);
            // set the owning side to null (unless already changed)
            if ($accommodation->getPlace() === $this) {
                $accommodation->setPlace(null);
            }
        }

        return $this;
    }
}

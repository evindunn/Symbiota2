<?php

namespace Collection\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;
use Core\Entity\Users;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * Collections
 *
 * @ORM\Table(name="omcollections", uniqueConstraints={@ORM\UniqueConstraint(name="Index_inst", columns={"InstitutionCode", "CollectionCode"})}, indexes={@ORM\Index(name="FK_collid_iid_idx", columns={"iid"})})
 * @ORM\Entity()
 * @ApiFilter(
 *      SearchFilter::class,
 *      properties={
 *          "collectionType": "exact"
 *      }
 * )
 * @ApiResource(
 *     attributes={"order"={"collectionName": "ASC"}},
 *     itemOperations={
 *          "get"={
 *             "normalization_context"={
 *                 "groups"={"get"}
 *             }
 *          },
 *          "put"={
 *              "access_control"="is_granted('CollAdmin', object.id)",
 *              "denormalization_context"={
 *                  "groups"={"put"}
 *              },
 *              "normalization_context"={
 *                  "groups"={"get"}
 *              }
 *          },
 *          "delete"={
 *            "access_control"="is_granted('CollAdmin', object.id)",
 *            "normalization_context"={
 *               "groups"={"get"}
 *             }
 *          }
 *      },
 *      collectionOperations={
 *          "get"={
 *              "normalization_context"={
 *                  "groups"={"get-list"}
 *              }
 *          },
 *          "post"={
 *              "access_control"="is_granted('SuperAdmin', object)",
 *              "denormalization_context"={
 *                  "groups"={"post"}
 *              },
 *              "normalization_context"={
 *                "groups"={"get"}
 *              }
 *          }
 *      }
 * )
 */
class Collections implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="CollID", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"get", "get-list"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="InstitutionCode", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     * @Groups({"get", "post", "put", "get-list"})
     */
    private $institutionCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CollectionCode", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     * @Groups({"get", "post", "put", "get-list"})
     */
    private $collectionCode;

    /**
     * @var string
     *
     * @ORM\Column(name="CollectionName", type="string", length=150)
     * @Assert\NotBlank()
     * @Assert\Length(max=150)
     * @Groups({"get", "post", "put", "get-list"})
     */
    private $collectionName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="collectionId", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     * @Groups({"get", "post", "put"})
     */
    private $collectionId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="datasetName", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     * @Groups({"get", "post", "put"})
     */
    private $datasetName;

    /**
     * @var Institutions
     *
     * @ORM\ManyToOne(targetEntity="Collection\Entity\Institutions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iid", referencedColumnName="iid")
     * })
     * @Groups({"get", "post", "put"})
     */
    private $institutionId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fulldescription", type="string", length=2000, nullable=true)
     * @Assert\Length(max=2000)
     * @Groups({"get", "post", "put"})
     */
    private $fullDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Homepage", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     * @Groups({"get", "post", "put"})
     */
    private $homepage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IndividualUrl", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     * @Groups({"get", "post", "put"})
     */
    private $individualUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Contact", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     * @Groups({"get", "post", "put"})
     */
    private $contact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     * @Assert\Email()
     * @Groups({"get", "post", "put"})
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="latitudedecimal", type="float", precision=8, scale=6, nullable=true)
     * @Assert\Type(type="float")
     * @Groups({"get", "post", "put"})
     */
    private $latitudeDecimal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="longitudedecimal", type="float", precision=9, scale=6, nullable=true)
     * @Assert\Type(type="float")
     * @Groups({"get", "post", "put"})
     */
    private $longitudeDecimal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     * @Groups({"get", "post", "put", "get-list"})
     */
    private $icon;

    /**
     * @var string
     *
     * @ORM\Column(name="CollType", type="string", length=45, options={"default"="Preserved Specimens","comment"="Preserved Specimens, General Observations, Observations"})
     * @Assert\Length(max=45)
     * @Groups({"get", "post", "put", "get-list"})
     */
    private $collectionType = 'Preserved Specimens';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ManagementType", type="string", length=45, nullable=true, options={"default"="Snapshot","comment"="Snapshot, Live Data"})
     * @Assert\Length(max=45)
     * @Groups({"get", "post", "put"})
     */
    private $managementType = 'Snapshot';

    /**
     * @var int
     *
     * @ORM\Column(name="PublicEdits", type="integer", options={"default"="1","unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     * @Groups({"get", "post", "put"})
     */
    private $publicEdits = 1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="collectionguid", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     * @Groups({"get", "post", "put"})
     */
    private $collectionGuid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="securitykey", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $securityKey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="guidtarget", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     * @Groups({"get", "post", "put"})
     */
    private $guidTarget;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rightsHolder", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     * @Groups({"get", "post", "put"})
     */
    private $rightsHolder;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rights", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     * @Groups({"get", "post", "put"})
     */
    private $rights;

    /**
     * @var string|null
     *
     * @ORM\Column(name="usageTerm", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     * @Groups({"get", "post", "put"})
     */
    private $usageTerm;

    /**
     * @var int|null
     *
     * @ORM\Column(name="publishToGbif", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     * @Groups({"get", "post", "put"})
     */
    private $publishToGbif;

    /**
     * @var int|null
     *
     * @ORM\Column(name="publishToIdigbio", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     * @Groups({"get", "post", "put"})
     */
    private $publishToIdigbio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="aggKeysStr", type="string", length=1000, nullable=true)
     * @Assert\Length(max=1000)
     * @Groups({"get", "post", "put"})
     */
    private $aggregatorKeyJson;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dwcaUrl", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     * @Groups({"get", "post", "put", "get-list"})
     */
    private $dwcaUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bibliographicCitation", type="string", length=1000, nullable=true)
     * @Assert\Length(max=1000)
     * @Groups({"get", "post", "put"})
     */
    private $bibliographicCitation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="accessrights", type="string", length=1000, nullable=true)
     * @Assert\Length(max=1000)
     * @Groups({"get", "post", "put"})
     */
    private $accessRights;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SortSeq", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     * @Groups({"get", "post", "put"})
     */
    private $sortSequence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Collection\Entity\Categories", mappedBy="collectionId")
     */
    private $collectionCategoryId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Core\Entity\Users")
     * @ORM\JoinTable(name="omcollectioncontacts",
     *   joinColumns={
     *     @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="uid", referencedColumnName="uid")
     *   }
     * )
     * @Groups({"get", "post", "put"})
     */
    private $userId;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->collectionCategoryId = new ArrayCollection();
        $this->userId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInstitutionCode(): ?string
    {
        return $this->institutionCode;
    }

    public function setInstitutionCode(string $institutionCode): self
    {
        $this->institutionCode = $institutionCode;

        return $this;
    }

    public function getCollectionCode(): ?string
    {
        return $this->collectionCode;
    }

    public function setCollectionCode(?string $collectionCode): self
    {
        $this->collectionCode = $collectionCode;

        return $this;
    }

    public function getCollectionName(): ?string
    {
        return $this->collectionName;
    }

    public function setCollectionName(string $collectionName): self
    {
        $this->collectionName = $collectionName;

        return $this;
    }

    public function getCollectionId(): ?string
    {
        return $this->collectionId;
    }

    public function setCollectionId(?string $collectionId): self
    {
        $this->collectionId = $collectionId;

        return $this;
    }

    public function getDatasetName(): ?string
    {
        return $this->datasetName;
    }

    public function setDatasetName(?string $datasetName): self
    {
        $this->datasetName = $datasetName;

        return $this;
    }

    public function getFullDescription(): ?string
    {
        return $this->fullDescription;
    }

    public function setFullDescription(?string $fullDescription): self
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    public function getHomepage(): ?string
    {
        return $this->homepage;
    }

    public function setHomepage(?string $homepage): self
    {
        $this->homepage = $homepage;

        return $this;
    }

    public function getIndividualUrl(): ?string
    {
        return $this->individualUrl;
    }

    public function setIndividualUrl(?string $individualUrl): self
    {
        $this->individualUrl = $individualUrl;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getLatitudeDecimal()
    {
        return $this->latitudeDecimal;
    }

    public function setLatitudeDecimal($latitudeDecimal): self
    {
        $this->latitudeDecimal = $latitudeDecimal;

        return $this;
    }

    public function getLongitudeDecimal()
    {
        return $this->longitudeDecimal;
    }

    public function setLongitudeDecimal($longitudeDecimal): self
    {
        $this->longitudeDecimal = $longitudeDecimal;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getCollectionType(): ?string
    {
        return $this->collectionType;
    }

    public function setCollectionType(string $collectionType): self
    {
        $this->collectionType = $collectionType;

        return $this;
    }

    public function getManagementType(): ?string
    {
        return $this->managementType;
    }

    public function setManagementType(?string $managementType): self
    {
        $this->managementType = $managementType;

        return $this;
    }

    public function getPublicEdits(): ?int
    {
        return $this->publicEdits;
    }

    public function setPublicEdits(int $publicEdits): self
    {
        $this->publicEdits = $publicEdits;

        return $this;
    }

    public function getCollectionGuid(): ?string
    {
        return $this->collectionGuid;
    }

    public function setCollectionGuid(?string $collectionGuid): self
    {
        $this->collectionGuid = $collectionGuid;

        return $this;
    }

    public function getSecurityKey(): ?string
    {
        return $this->securityKey;
    }

    public function setSecurityKey(?string $securityKey): self
    {
        $this->securityKey = $securityKey;

        return $this;
    }

    public function getGuidTarget(): ?string
    {
        return $this->guidTarget;
    }

    public function setGuidTarget(?string $guidTarget): self
    {
        $this->guidTarget = $guidTarget;

        return $this;
    }

    public function getRightsHolder(): ?string
    {
        return $this->rightsHolder;
    }

    public function setRightsHolder(?string $rightsHolder): self
    {
        $this->rightsHolder = $rightsHolder;

        return $this;
    }

    public function getRights(): ?string
    {
        return $this->rights;
    }

    public function setRights(?string $rights): self
    {
        $this->rights = $rights;

        return $this;
    }

    public function getUsageTerm(): ?string
    {
        return $this->usageTerm;
    }

    public function setUsageTerm(?string $usageTerm): self
    {
        $this->usageTerm = $usageTerm;

        return $this;
    }

    public function getPublishToGbif(): ?int
    {
        return $this->publishToGbif;
    }

    public function setPublishToGbif(?int $publishToGbif): self
    {
        $this->publishToGbif = $publishToGbif;

        return $this;
    }

    public function getPublishToIdigbio(): ?int
    {
        return $this->publishToIdigbio;
    }

    public function setPublishToIdigbio(?int $publishToIdigbio): self
    {
        $this->publishToIdigbio = $publishToIdigbio;

        return $this;
    }

    public function getAggregatorKeyJson(): ?string
    {
        return $this->aggregatorKeyJson;
    }

    public function setAggregatorKeyJson(?string $aggregatorKeyJson): self
    {
        $this->aggregatorKeyJson = $aggregatorKeyJson;

        return $this;
    }

    public function getDwcaUrl(): ?string
    {
        return $this->dwcaUrl;
    }

    public function setDwcaUrl(?string $dwcaUrl): self
    {
        $this->dwcaUrl = $dwcaUrl;

        return $this;
    }

    public function getBibliographicCitation(): ?string
    {
        return $this->bibliographicCitation;
    }

    public function setBibliographicCitation(?string $bibliographicCitation): self
    {
        $this->bibliographicCitation = $bibliographicCitation;

        return $this;
    }

    public function getAccessRights(): ?string
    {
        return $this->accessRights;
    }

    public function setAccessRights(?string $accessRights): self
    {
        $this->accessRights = $accessRights;

        return $this;
    }

    public function getSortSequence(): ?int
    {
        return $this->sortSequence;
    }

    public function setSortSequence(?int $sortSequence): self
    {
        $this->sortSequence = $sortSequence;

        return $this;
    }

    public function getInitialTimestamp(): ?DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getInstitutionId(): ?Institutions
    {
        return $this->institutionId;
    }

    public function setInstitutionId(?Institutions $institutionId): self
    {
        $this->institutionId = $institutionId;

        return $this;
    }

    /**
     * @return Collection|Categories[]
     */
    public function getCollectionCategoryId(): Collection
    {
        return $this->collectionCategoryId;
    }

    public function addCollectionCategoryId(Categories $collectionCategoryId): self
    {
        if (!$this->collectionCategoryId->contains($collectionCategoryId)) {
            $this->collectionCategoryId[] = $collectionCategoryId;
            $collectionCategoryId->addCollectionId($this);
        }

        return $this;
    }

    public function removeCollectionCategoryId(Categories $collectionCategoryId): self
    {
        if ($this->collectionCategoryId->contains($collectionCategoryId)) {
            $this->collectionCategoryId->removeElement($collectionCategoryId);
            $collectionCategoryId->removeCollectionId($this);
        }

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getUserId(): Collection
    {
        return $this->userId;
    }

    public function addUserId(Users $userId): self
    {
        if (!$this->userId->contains($userId)) {
            $this->userId[] = $userId;
        }

        return $this;
    }

    public function removeUserId(Users $userId): self
    {
        if ($this->userId->contains($userId)) {
            $this->userId->removeElement($userId);
        }

        return $this;
    }

}

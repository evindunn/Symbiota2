<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ChecklistProjectCategories
 *
 * @ORM\Table(name="fmprojectcategories", indexes={@ORM\Index(name="FK_fmprojcat_pid_idx", columns={"pid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ChecklistProjectCategoriesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class ChecklistProjectCategories implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="projcatid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\ChecklistProjects
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\ChecklistProjects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pid", referencedColumnName="pid")
     * })
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $projectId;

    /**
     * @var string
     *
     * @ORM\Column(name="categoryname", type="string", length=150)
     * @Assert\NotBlank()
     * @Assert\Length(max=150)
     */
    private $categoryName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="managers", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $managers;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $description;

    /**
     * @var int|null
     *
     * @ORM\Column(name="parentpid", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $parentProjectId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="occurrencesearch", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $occurrenceSearch;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ispublic", type="integer", nullable=true, options={"default"="1"})
     * @Assert\Type(type="integer")
     */
    private $isPublic = 1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $sortSequence;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    public function setCategoryName(string $categoryName): self
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    public function getManagers(): ?string
    {
        return $this->managers;
    }

    public function setManagers(?string $managers): self
    {
        $this->managers = $managers;

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

    public function getParentProjectId(): ?int
    {
        return $this->parentProjectId;
    }

    public function setParentProjectId(?int $parentProjectId): self
    {
        $this->parentProjectId = $parentProjectId;

        return $this;
    }

    public function getOccurrenceSearch(): ?int
    {
        return $this->occurrenceSearch;
    }

    public function setOccurrenceSearch(?int $occurrenceSearch): self
    {
        $this->occurrenceSearch = $occurrenceSearch;

        return $this;
    }

    public function getIsPublic(): ?int
    {
        return $this->isPublic;
    }

    public function setIsPublic(?int $isPublic): self
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

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

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(?\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getProjectId(): ?ChecklistProjects
    {
        return $this->projectId;
    }

    public function setProjectId(?ChecklistProjects $projectId): self
    {
        $this->projectId = $projectId;

        return $this;
    }


}
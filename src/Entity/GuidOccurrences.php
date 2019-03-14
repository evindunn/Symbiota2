<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * GuidOccurrences
 *
 * @ORM\Table(name="guidoccurrences", uniqueConstraints={@ORM\UniqueConstraint(name="guidoccurrences_occid_unique", columns={"occid"})})
 * @ORM\Entity(repositoryClass="App\Repository\GuidOccurrencesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class GuidOccurrences implements InitialTimestampInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="guid", type="string", length=45)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Assert\NotBlank()
     */
    private $guid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="occid", type="integer", options={"unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $occurrenceId;

    /**
     * @var int
     *
     * @ORM\Column(name="archivestatus", type="integer")
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $archiveStatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="archiveobj", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $archiveObject;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getGuid(): ?string
    {
        return $this->guid;
    }

    public function getOccurrenceId(): ?int
    {
        return $this->occurrenceId;
    }

    public function setOccurrenceId(?int $occurrenceId): self
    {
        $this->occurrenceId = $occurrenceId;

        return $this;
    }

    public function getArchiveStatus(): ?int
    {
        return $this->archiveStatus;
    }

    public function setArchiveStatus(int $archiveStatus): self
    {
        $this->archiveStatus = $archiveStatus;

        return $this;
    }

    public function getArchiveObject(): ?string
    {
        return $this->archiveObject;
    }

    public function setArchiveObject(?string $archiveObject): self
    {
        $this->archiveObject = $archiveObject;

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

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }


}
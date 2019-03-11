<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CrowdSourceQueue
 *
 * @ORM\Table(name="omcrowdsourcequeue", uniqueConstraints={@ORM\UniqueConstraint(name="Index_omcrowdsource_occid", columns={"occid"})}, indexes={@ORM\Index(name="FK_omcrowdsourcequeue_uid", columns={"uidprocessor"})})
 * @ORM\Entity(repositoryClass="App\Repository\CrowdSourceQueueRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class CrowdSourceQueue implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="idomcrowdsourcequeue", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="omcsid", type="integer")
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $crowdSourceCentralId;

    /**
     * @var \App\Entity\Occurrences
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     * @Assert\NotBlank()
     */
    private $occurrenceId;

    /**
     * @var int
     *
     * @ORM\Column(name="reviewstatus", type="integer", options={"comment"="0=open,5=pending review, 10=closed"})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $reviewStatus;

    /**
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uidprocessor", referencedColumnName="uid")
     * })
     * @Assert\NotBlank()
     */
    private $userIdProcessor;

    /**
     * @var int|null
     *
     * @ORM\Column(name="points", type="integer", nullable=true, options={"comment"="0=fail, 1=minor edits, 2=no edits <default>, 3=excelled"})
     * @Assert\Type(type="integer")
     */
    private $points;

    /**
     * @var int
     *
     * @ORM\Column(name="isvolunteer", type="integer", options={"default"="1"})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $isVolunteer = 1;

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
     * @Assert\NotBlank()
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCrowdSourceCentralId(): ?int
    {
        return $this->crowdSourceCentralId;
    }

    public function setCrowdSourceCentralId(int $crowdSourceCentralId): self
    {
        $this->crowdSourceCentralId = $crowdSourceCentralId;

        return $this;
    }

    public function getReviewStatus(): ?int
    {
        return $this->reviewStatus;
    }

    public function setReviewStatus(int $reviewStatus): self
    {
        $this->reviewStatus = $reviewStatus;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getIsVolunteer(): ?int
    {
        return $this->isVolunteer;
    }

    public function setIsVolunteer(int $isVolunteer): self
    {
        $this->isVolunteer = $isVolunteer;

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

    public function getOccurrenceId(): ?Occurrences
    {
        return $this->occurrenceId;
    }

    public function setOccurrenceId(?Occurrences $occurrenceId): self
    {
        $this->occurrenceId = $occurrenceId;

        return $this;
    }

    public function getUserIdProcessor(): ?Users
    {
        return $this->userIdProcessor;
    }

    public function setUserIdProcessor(?Users $userIdProcessor): self
    {
        $this->userIdProcessor = $userIdProcessor;

        return $this;
    }


}

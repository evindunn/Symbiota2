<?php

namespace Glossary\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;

/**
 * TermLink
 *
 * @ORM\Table(name="glossarytermlink", uniqueConstraints={@ORM\UniqueConstraint(name="Unique_termkeys", columns={"glossgrpid", "glossid"})}, indexes={@ORM\Index(name="glossarytermlink_ibfk_1", columns={"glossid"}), @ORM\Index(name="IDX_5FB96611732EDCB4", columns={"glossgrpid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/glossary",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class TermLink implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="gltlinkid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Glossary\Entity\Glossary
     *
     * @ORM\ManyToOne(targetEntity="Glossary\Entity\Glossary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="glossgrpid", referencedColumnName="glossid", nullable=false)
     * })
     */
    private $glossaryGroupId;

    /**
     * @var \Glossary\Entity\Glossary
     *
     * @ORM\ManyToOne(targetEntity="Glossary\Entity\Glossary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="glossid", referencedColumnName="glossid", nullable=false)
     * })
     */
    private $glossaryId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="relationshipType", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $relationshipType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRelationshipType(): ?string
    {
        return $this->relationshipType;
    }

    public function setRelationshipType(?string $relationshipType): self
    {
        $this->relationshipType = $relationshipType;

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

    public function getGlossaryId(): ?Glossary
    {
        return $this->glossaryId;
    }

    public function setGlossaryId(?Glossary $glossaryId): self
    {
        $this->glossaryId = $glossaryId;

        return $this;
    }

    public function getGlossaryGroupId(): ?Glossary
    {
        return $this->glossaryGroupId;
    }

    public function setGlossaryGroupId(?Glossary $glossaryGroupId): self
    {
        $this->glossaryGroupId = $glossaryGroupId;

        return $this;
    }


}

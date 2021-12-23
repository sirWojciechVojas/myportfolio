<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
#[UniqueEntity('name')]
class Project
{

    public const NUMBER = 6;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Assert\NotBlank]
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    #[Assert\NotBlank]
    private $chapo;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[Assert\Url]
    private $website;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[Assert\Url]
    private $github;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\OneToOne(targetEntity=Image::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    #[Assert\Valid]
    private $featured;

    /**
     * @ORM\ManyToMany(targetEntity=Skill::class)
     */
    private $skills;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
    }
    
    /**
     * getId
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    
    /**
     * getName
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    
    /**
     * setName
     *
     * @param  string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
    
    /**
     * getChapo
     *
     * @return string|null
     */
    public function getChapo(): ?string
    {
        return $this->chapo;
    }
    
    /**
     * setChapo
     *
     * @param  string $chapo
     * @return self
     */
    public function setChapo(string $chapo): self
    {
        $this->chapo = $chapo;

        return $this;
    }
        
    /**
     * getCreatedAt
     *
     * @return DateTimeImmutable|null
     */
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }
    
    /**
     * setCreatedAt
     *
     * @param  DateTimeImmutable $createdAt
     * @return self
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
    
    /**
     * getWebsite
     *
     * @return string|null
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }
    
    /**
     * setWebsite
     *
     * @param  string|null $website
     * @return self
     */
    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }
    
    /**
     * getGithub
     *
     * @return string|null
     */
    public function getGithub(): ?string
    {
        return $this->github;
    }
    
    /**
     * setGithub
     *
     * @param  string|null $github
     * @return self
     */
    public function setGithub(?string $github): self
    {
        $this->github = $github;

        return $this;
    }
    
    /**
     * getAuthor
     *
     * @return User|null
     */
    public function getAuthor(): ?User
    {
        return $this->author;
    }
    
    /**
     * setAuthor
     *
     * @param  User|null $author
     * @return self
     */
    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }
    
    /**
     * getFeatured
     *
     * @return Image|null
     */
    public function getFeatured(): ?Image
    {
        return $this->featured;
    }
    
    /**
     * setFeatured
     *
     * @param  Image $featured
     * @return self
     */
    public function setFeatured(Image $featured): self
    {
        $this->featured = $featured;

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }
    
    /**
     * addSkill
     *
     * @param  Skill $skill
     * @return self
     */
    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
        }

        return $this;
    }
    
    /**
     * removeSkill
     *
     * @param  Skill $skill
     * @return self
     */
    public function removeSkill(Skill $skill): self
    {
        $this->skills->removeElement($skill);

        return $this;
    }
}

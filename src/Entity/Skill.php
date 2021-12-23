<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=SkillRepository::class)
 */
#[UniqueEntity('name')]
class Skill
{
    public const NUMBER = 10;

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
    #[Assert\Length(
        min: 2,
        minMessage: 'Le nom de la compétence doit posséder au minimum {{ limit }} charactères.'
    )]
    private $name;

    /**
     * @ORM\Column(type="string", length=10)
     */
    #[Assert\NotBlank]
    #[Assert\CssColor(
        formats: Assert\CssColor::HEX_LONG,
        message: 'La couleur doit être une couleur hexadécimale à 6 caractères.',
    )]
    private $color;

    /**
     * @ORM\Column(type="integer")
     */
    #[Assert\NotBlank]
    #[Assert\Type(
        type: 'integer'
    )]
    #[Assert\LessThanOrEqual(100)]
    #[Assert\GreaterThanOrEqual(0)]
    private $level;
    
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
     * getColor
     *
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }
    
    /**
     * setColor
     *
     * @param  string $color
     * @return self
     */
    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }
    
    /**
     * getLevel
     *
     * @return int|null
     */
    public function getLevel(): ?int
    {
        return $this->level;
    }
    
    /**
     * setLevel
     *
     * @param  int $level
     * @return self
     */
    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }
}

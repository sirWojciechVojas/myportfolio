<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Assert\NotBlank]
    private $alt;

    private $file;
    
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
     * getPath
     *
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }
    
    /**
     * setPath
     *
     * @param  string $path
     * @return self
     */
    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }
    
    /**
     * getAlt
     *
     * @return string|null
     */
    public function getAlt(): ?string
    {
        return $this->alt;
    }
    
    /**
     * setAlt
     *
     * @param  string $alt
     * @return self
     */
    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get the value of file
     */ 
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set the value of file
     *
     * @return  self
     */ 
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;

        return $this;
    }
}

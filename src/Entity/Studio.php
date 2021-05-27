<?php

namespace App\Entity;

use App\Repository\StudioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudioRepository::class)
 */
class Studio
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
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=Movie::class, mappedBy="studio", cascade={"persist", "remove"})
     */
    private $movie;

    public function getId(): ?int
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

    public function getMovie(): ?Movie
    {
        return $this->movie;
    }

    public function setMovie(?Movie $movie): self
    {
        // unset the owning side of the relation if necessary
        if ($movie === null && $this->movie !== null) {
            $this->movie->setStudio(null);
        }

        // set the owning side of the relation if necessary
        if ($movie !== null && $movie->getStudio() !== $this) {
            $movie->setStudio($this);
        }

        $this->movie = $movie;

        return $this;
    }
}

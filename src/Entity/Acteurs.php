<?php

namespace App\Entity;

use App\Repository\ActeursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActeursRepository::class)
 */
class Acteurs
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
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $prenom;

    /**
     * @ORM\ManyToMany(targetEntity=films::class, inversedBy="acteurs")
     */
    private $films;

    public function __construct()
    {
        $this->films = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?int
    {
        return $this->prenom;
    }

    public function setPrenom(int $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection|films[]
     */
    public function getFilms(): Collection
    {
        return $this->films;
    }

    public function addFilm(films $film): self
    {
        if (!$this->films->contains($film)) {
            $this->films[] = $film;
        }

        return $this;
    }

    public function removeFilm(films $film): self
    {
        $this->films->removeElement($film);

        return $this;
    }
}

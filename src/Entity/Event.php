<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;
use  Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormTypeInterface;
/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    public $nom_e;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $organisateur;

    /**
     * @ORM\Column(type="date")
     * @Assert\Expression("this.getDateDebut() < this.getDateFin()")
     */
    public $date_debut;

    /**
     * @ORM\Column(type="date")
     * @Assert\Expression("this.getDateDebut() < this.getDateFin()")
     */
    public $date_fin;

    /**
     * @ORM\Column(type="time")
     */
    public $heure;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=30)
     *  @Assert\Length(min="8", minMessage="your phone must be 8 characters long")
     */
    private $tel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $event_rating;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $average_rating;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomE(): ?string
    {
        return $this->nom_e;
    }

    public function setNomE(string $nom_e): self
    {
        $this->nom_e = $nom_e;

        return $this;
    }

    public function getOrganisateur(): ?string
    {
        return $this->organisateur;
    }

    public function setOrganisateur(string $organisateur): self
    {
        $this->organisateur = $organisateur;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getEventRating(): ?int
    {
        return $this->event_rating;
    }

    public function setEventRating(?int $event_rating): self
    {
        $this->event_rating = $event_rating;

        return $this;
    }

    public function getAverageRating(): ?float
    {
        return $this->average_rating;
    }

    public function setAverageRating(?float $average_rating): self
    {
        $this->average_rating = $average_rating;

        return $this;
    }
}

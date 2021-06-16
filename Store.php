<?php

namespace App\Entity;

use App\Repository\StoreRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=StoreRepository::class)
 */
class Store
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column (type="string",length=255)
     * @Assert\NotBlank(message="Please, upload the photo.")
     * @Assert\File(mimeTypes={ "image/png", "image/jpeg" })
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Panier", mappedBy="store_id",cascade={"persist", "remove"})
     */
    private $panier;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LigneCommande", mappedBy="store_id",cascade={"persist", "remove"})
     */
    private $lignecommande;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPanier()
    {
        return $this->panier;
    }

    /**
     * @param mixed $panier
     */
    public function setPanier($panier): void
    {
        $this->panier = $panier;
    }

    /**
     * @return mixed
     */
    public function getLignecommande()
    {
        return $this->lignecommande;
    }

    /**
     * @param mixed $lignecommande
     */
    public function setLignecommande($lignecommande): void
    {
        $this->lignecommande = $lignecommande;
    }

}

<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PanierRepository::class)
 */
class Panier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Store", inversedBy="panier")
     */
    private $store_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixPiece;

    /**
     * @ORM\Column(type="integer")
     */
    private $quanitie;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixTotal;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getStoreId()
    {
        return $this->store_id;
    }

    /**
     * @param mixed $store_id
     */
    public function setStoreId($store_id): void
    {
        $this->store_id = $store_id;
    }



    public function getPrixPiece(): ?int
    {
        return $this->prixPiece;
    }

    public function setPrixPiece(int $prixPiece): self
    {
        $this->prixPiece = $prixPiece;

        return $this;
    }

    public function getQuanitie(): ?int
    {
        return $this->quanitie;
    }

    public function setQuanitie(int $quanitie): self
    {
        $this->quanitie = $quanitie;

        return $this;
    }

    public function getPrixTotal(): ?int
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(int $prixTotal): self
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }
}

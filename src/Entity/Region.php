<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="region")
 * @ORM\Entity(repositoryClass="App\Repository\RegionRepository") 
 */
class Region
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_region", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRegion;

    /**
     * @var string
     *
     * @ORM\Column(name="code_region", type="string", length=3, nullable=false)
     */
    private $codeRegion;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_region", type="string", length=100, nullable=false)
     */
    private $nomRegion;

    /**
     * @var string
     *
     * @ORM\Column(name="slug_region", type="string", length=100, nullable=false)
     */
    private $slugRegion;

    public function getIdRegion(): ?int
    {
        return $this->idRegion;
    }

    public function getCodeRegion(): ?string
    {
        return $this->codeRegion;
    }

    public function setCodeRegion(string $codeRegion): static
    {
        $this->codeRegion = $codeRegion;

        return $this;
    }

    public function getNomRegion(): ?string
    {
        return $this->nomRegion;
    }

    public function setNomRegion(string $nomRegion): static
    {
        $this->nomRegion = $nomRegion;

        return $this;
    }

    public function getSlugRegion(): ?string
    {
        return $this->slugRegion;
    }

    public function setSlugRegion(string $slugRegion): static
    {
        $this->slugRegion = $slugRegion;

        return $this;
    }


}

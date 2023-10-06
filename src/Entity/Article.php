<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="article_sous_categorie0_FK", columns={"id_sous_categorie"}), @ORM\Index(name="article_utilisateur_FK", columns={"id_utilisateur"})})
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository") 
 */
class Article 
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_article", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_article", type="string", length=100, nullable=false)
     */
    private $titreArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="slug_article", type="string", length=100, nullable=false)
     */
    private $slugArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_article", type="text", length=65535, nullable=false)
     */
    private $contenuArticle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=false)
     */
    private $dateCreation;

    /**
     * @var \SousCategorie
     *
     * @ORM\ManyToOne(targetEntity="SousCategorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sous_categorie", referencedColumnName="id_sous_categorie")
     * })
     */
    private $idSousCategorie;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur")
     * })
     */
    private $idUtilisateur;

    public function getIdArticle(): ?int
    {
        return $this->idArticle;
    }

    public function getTitreArticle(): ?string
    {
        return $this->titreArticle;
    }

    public function setTitreArticle(string $titreArticle): static
    {
        $this->titreArticle = $titreArticle;

        return $this;
    }

    public function getSlugArticle(): ?string
    {
        return $this->slugArticle;
    }

    public function setSlugArticle(string $slugArticle): static
    {
        $this->slugArticle = $slugArticle;

        return $this;
    }

    public function getContenuArticle(): ?string
    {
        return $this->contenuArticle;
    }

    public function setContenuArticle(string $contenuArticle): static
    {
        $this->contenuArticle = $contenuArticle;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getIdSousCategorie(): ?SousCategorie
    {
        return $this->idSousCategorie;
    }

    public function setIdSousCategorie(?SousCategorie $idSousCategorie): static
    {
        $this->idSousCategorie = $idSousCategorie;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $idUtilisateur): static
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

  

}

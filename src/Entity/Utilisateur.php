<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherAwareInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur", indexes={@ORM\Index(name="utilisateur_ville_FK", columns={"id_ville"}), @ORM\Index(name="utilisateur_role_utilisateur0_FK", columns={"id_role_utilisateur"})})
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository") 
 */
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface, PasswordHasherAwareInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_utilisateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtilisateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom", type="string", length=100, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=100, nullable=false)
     */
    private $mdp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ip_inscription", type="string", length=50, nullable=true)
     */
    private $ipInscription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscription", type="date", nullable=false)
     */
    private $dateInscription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tracker", type="string", length=255, nullable=true)
     */
    private $tracker;

    /**
     * @var string
     *
     * @ORM\Column(name="code_roles", type="string", length=50, nullable=false)
     */
    private $codeRoles;

    /**
     * @var \RoleUtilisateur
     *
     * @ORM\ManyToOne(targetEntity="RoleUtilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_role_utilisateur", referencedColumnName="id_role_utilisateur")
     * })
     */
    private $idRoleUtilisateur;

    /**
     * @var \Ville
     *
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ville", referencedColumnName="id_ville")
     * })
     */
    private $idVille;

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getIpInscription(): ?string
    {
        return $this->ipInscription;
    }

    public function setIpInscription(?string $ipInscription): static
    {
        $this->ipInscription = $ipInscription;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): static
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getTracker(): ?string
    {
        return $this->tracker;
    }

    public function setTracker(?string $tracker): static
    {
        $this->tracker = $tracker;

        return $this;
    }

    public function getCodeRoles(): ?string
    {
        return $this->codeRoles;
    }

    public function setCodeRoles(string $codeRoles): static
    {
        $this->codeRoles = $codeRoles;

        return $this;
    }

    public function getIdRoleUtilisateur(): ?RoleUtilisateur
    {
        return $this->idRoleUtilisateur;
    }

    public function setIdRoleUtilisateur(?RoleUtilisateur $idRoleUtilisateur): static
    {
        $this->idRoleUtilisateur = $idRoleUtilisateur;

        return $this;
    }

    public function getIdVille(): ?Ville
    {
        return $this->idVille;
    }

    public function setIdVille(?Ville $idVille): static
    {
        $this->idVille = $idVille;

        return $this;
    }

    //--------- UserInterface

    /**
     * The public representation of the user (e.g. a username, an email address, etc.)
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {        
        $roles[] = $this->codeRoles;
        return array_unique($roles);
    }

    /**
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->mdp;
    }

    public function getPasswordHasherName(): ?string
    {
        return null;
    }


}

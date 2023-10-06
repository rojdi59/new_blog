<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RoleUtilisateur
 *
 * @ORM\Table(name="role_utilisateur")
 * @ORM\Entity(repositoryClass="App\Repository\RoleUtilisateurRepository") 
 */
class RoleUtilisateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_role_utilisateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRoleUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="lib_role_utilisateur", type="string", length=100, nullable=false)
     */
    private $libRoleUtilisateur;

    public function getIdRoleUtilisateur(): ?int
    {
        return $this->idRoleUtilisateur;
    }

    public function getLibRoleUtilisateur(): ?string
    {
        return $this->libRoleUtilisateur;
    }

    public function setLibRoleUtilisateur(string $libRoleUtilisateur): static
    {
        $this->libRoleUtilisateur = $libRoleUtilisateur;

        return $this;
    }


}

<?php

namespace App\Entity;

use App\Repository\VillesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VillesRepository::class)
 */
class Villes
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $no_ville;

    /**
     * @ORM\Column(type="string", length=30, name="nom_ville")
     */
    private $nomVille;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $code_postal;

    /**
     * @return mixed
     */
    public function getNoVille()
    {
        return $this->no_ville;
    }

    /**
     * @param mixed $no_ville
     */
    public function setNoVille($no_ville): void
    {
        $this->no_ville = $no_ville;
    }

    /**
     * @return mixed
     */
    public function getNomVille()
    {
        return $this->nomVille;
    }

    /**
     * @param mixed $nomVille
     */
    public function setNomVille($nomVille): void
    {
        $this->nomVille = $nomVille;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->code_postal;
    }

    /**
     * @param mixed $code_postal
     */
    public function setCodePostal($code_postal): void
    {
        $this->code_postal = $code_postal;
    }


}

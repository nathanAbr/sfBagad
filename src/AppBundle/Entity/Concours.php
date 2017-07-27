<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Concours
 *
 * @ORM\Table(name="concours")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ConcoursRepository")
 */
class Concours extends Evenement
{
    /**
     * @ORM\OneToOne(targetEntity="Resultat", mappedBy="concours")
     */
    private $resultat;

    /**
     * Get resultat
     *
     * @return \AppBundle\Entity\Resultat
     */
    public function getResultat()
    {
        return $this->resultat;
    }
}

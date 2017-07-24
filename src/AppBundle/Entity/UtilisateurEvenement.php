<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur_evenement
 *
 * @ORM\Table(name="utilisateur_evenement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Utilisateur_evenementRepository")
 */
class Utilisateur_evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="present", type="boolean")
     */
    private $present;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set present
     *
     * @param boolean $present
     *
     * @return Utilisateur_evenement
     */
    public function setPresent($present)
    {
        $this->present = $present;

        return $this;
    }

    /**
     * Get present
     *
     * @return bool
     */
    public function getPresent()
    {
        return $this->present;
    }
}


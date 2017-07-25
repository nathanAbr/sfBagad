<?php

namespace AppBundle\Entity;

/**
 * Utilisateur_evenement
 */
class Utilisateur_evenement
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $present;


    /**
     * Get id
     *
     * @return integer
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
     * @return boolean
     */
    public function getPresent()
    {
        return $this->present;
    }
}


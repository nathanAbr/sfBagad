<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 *
 * @ORM\Table(name="session")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SessionRepository")
 */
class Session extends Evenement
{

    /**
     * @ORM\ManyToOne(targetEntity="Instrument", inversedBy="sessions")
     */
    private $instrument;


    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="professeurs")
     */
    private $professeur;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * Set instrument
     *
     * @param \AppBundle\Entity\Instrument $instrument
     *
     * @return Session
     */
    public function setInstrument(\AppBundle\Entity\Instrument $instrument = null)
    {
        $this->instrument = $instrument;

        return $this;
    }

    /**
     * Get instrument
     *
     * @return \AppBundle\Entity\Instrument
     */
    public function getInstrument()
    {
        return $this->instrument;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Session
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->type;
    }

    /**
     * Set professeur
     *
     * @param \AppBundle\Entity\Utilisateur $professeur
     *
     * @return Session
     */
    public function setProfesseur(\AppBundle\Entity\Utilisateur $professeur = null)
    {
        $this->professeur = $professeur;

        return $this;
    }

    /**
     * Get professeur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getProfesseur()
    {
        return $this->professeur;
    }
}

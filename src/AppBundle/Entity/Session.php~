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
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Instrument", inversedBy="sessions")
     */
    private $instrument;


    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="professeurs")
     */
    private $professeur;
    


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

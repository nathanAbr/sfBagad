<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Instrument
 *
 * @ORM\Table(name="instrument")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InstrumentRepository")
 */
class Instrument
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="Utilisateur", mappedBy="instrument")
     */
    private $utilisateurs;

    /**
     * @ORM\OneToMany(targetEntity="Session", mappedBy="instrument")
     */
    private $sessions;


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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Instrument
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->utlisateurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add utlisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utlisateur
     *
     * @return Instrument
     */
    public function addUtlisateur(\AppBundle\Entity\Utilisateur $utlisateur)
    {
        $this->utlisateurs[] = $utlisateur;

        return $this;
    }

    /**
     * Remove utlisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utlisateur
     */
    public function removeUtlisateur(\AppBundle\Entity\Utilisateur $utlisateur)
    {
        $this->utlisateurs->removeElement($utlisateur);
    }

    /**
     * Get utlisateurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUtlisateurs()
    {
        return $this->utlisateurs;
    }

    /**
     * Add utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Instrument
     */
    public function addUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateurs[] = $utilisateur;

        return $this;
    }

    /**
     * Remove utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     */
    public function removeUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateurs->removeElement($utilisateur);
    }

    /**
     * Get utilisateurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }

    /**
     * Add session
     *
     * @param \AppBundle\Entity\Session $session
     *
     * @return Instrument
     */
    public function addSession(\AppBundle\Entity\Session $session)
    {
        $this->sessions[] = $session;

        return $this;
    }

    /**
     * Remove session
     *
     * @param \AppBundle\Entity\Session $session
     */
    public function removeSession(\AppBundle\Entity\Session $session)
    {
        $this->sessions->removeElement($session);
    }

    /**
     * Get sessions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSessions()
    {
        return $this->sessions;
    }
}

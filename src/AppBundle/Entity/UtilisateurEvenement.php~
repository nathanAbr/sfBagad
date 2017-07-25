<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UtilisateurEvenement
 *
 * @ORM\Table(name="utilisateur_evenement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UtilisateurEvenementRepository")
 */
class UtilisateurEvenement
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
     * @ORM\ManyToOne(targetEntity="Evenement", inversedBy="utilisateurEvenements")
     */
    private $evenements;

    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="utilisateurEvenements")
     */
    private $utilisateur;

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

    /**
     * Set evenements
     *
     * @param \AppBundle\Entity\Evenement $evenements
     *
     * @return UtilisateurEvenement
     */
    public function setEvenements(\AppBundle\Entity\Evenement $evenements = null)
    {
        $this->evenements = $evenements;

        return $this;
    }

    /**
     * Get evenements
     *
     * @return \AppBundle\Entity\Evenement
     */
    public function getEvenements()
    {
        return $this->evenements;
    }

    /**
     * Set utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return UtilisateurEvenement
     */
    public function setUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}

<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UtilisateurRepository")
 */
class Utilisateur extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Article", mappedBy="auteur")
     */
    private $articles;

    /**
     * @ORM\ManyToOne(targetEntity="Instrument", inversedBy="utilisateurs")
     * @ORM\JoinColumn(name="instrument_id", referencedColumnName="id")
     */
    private $instrument;

    /**
     * @ORM\OneToMany(targetEntity="Session", mappedBy="professeur")
     */
    private $professeurs;

    /**
     * @ORM\OneToMany(targetEntity="UtilisateurEvenement", mappedBy="utilisateur")
     */
    private $utilisateurEvenements;

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
     * Constructor
     */
    public function __construct()
    {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add article
     *
     * @param \AppBundle\Entity\Article $article
     *
     * @return Utilisateur
     */
    public function addArticle(\AppBundle\Entity\Article $article)
    {
        $this->articles[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \AppBundle\Entity\Article $article
     */
    public function removeArticle(\AppBundle\Entity\Article $article)
    {
        $this->articles->removeElement($article);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Set instrument
     *
     * @param \AppBundle\Entity\Instrument $instrument
     *
     * @return Utilisateur
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
     * Add professeur
     *
     * @param \AppBundle\Entity\Session $professeur
     *
     * @return Utilisateur
     */
    public function addProfesseur(\AppBundle\Entity\Session $professeur)
    {
        $this->professeurs[] = $professeur;

        return $this;
    }

    /**
     * Remove professeur
     *
     * @param \AppBundle\Entity\Session $professeur
     */
    public function removeProfesseur(\AppBundle\Entity\Session $professeur)
    {
        $this->professeurs->removeElement($professeur);
    }

    /**
     * Get professeurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProfesseurs()
    {
        return $this->professeurs;
    }

    /**
     * Add utilisateurEvenement
     *
     * @param \AppBundle\Entity\UtilisateurEvenement $utilisateurEvenement
     *
     * @return Utilisateur
     */
    public function addUtilisateurEvenement(\AppBundle\Entity\UtilisateurEvenement $utilisateurEvenement)
    {
        $this->utilisateurEvenements[] = $utilisateurEvenement;

        return $this;
    }

    /**
     * Remove utilisateurEvenement
     *
     * @param \AppBundle\Entity\UtilisateurEvenement $utilisateurEvenement
     */
    public function removeUtilisateurEvenement(\AppBundle\Entity\UtilisateurEvenement $utilisateurEvenement)
    {
        $this->utilisateurEvenements->removeElement($utilisateurEvenement);
    }

    /**
     * Get utilisateurEvenements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUtilisateurEvenements()
    {
        return $this->utilisateurEvenements;
    }
}

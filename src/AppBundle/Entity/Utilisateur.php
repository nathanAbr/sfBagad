<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @var string
     *
     * @ORM\Column(name="nom", type="string")
     */
    protected $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string")
     */
    protected $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="datetime")
     */
    protected $date_naissance;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string")
     */
    protected $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string")
     */
    protected $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string")
     */
    protected $ville;

    /**
     * @var bool
     *
     * @ORM\Column(name="cotisation", type="boolean")
     */
    protected $cotisation;

    /**
     * @ORM\OneToMany(targetEntity="Article", mappedBy="auteur")
     */
    private $articles;

    /**
     * @ORM\ManyToOne(targetEntity="Instrument", inversedBy="utilisateurs")
     * @ORM\JoinColumn(name="instrument_id", referencedColumnName="id")
     * @Assert\Type(type="AppBundle\Entity\Instrument")
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

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Utilisateur
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->date_naissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Utilisateur
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set cp
     *
     * @param string $cp
     *
     * @return Utilisateur
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Utilisateur
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set cotisation
     *
     * @param boolean $cotisation
     *
     * @return Utilisateur
     */
    public function setCotisation($cotisation)
    {
        $this->cotisation = $cotisation;

        return $this;
    }

    /**
     * Get cotisation
     *
     * @return boolean
     */
    public function getCotisation()
    {
        return $this->cotisation;
    }
}

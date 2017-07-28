<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EvenementRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({
 *     "evenement" = "Evenement",
 *     "concours" = "Concours",
 *     "sortie" = "Sortie",
 *     "reunion" = "Reunion",
 *     "session" = "Session"
 *     })
 */
class Evenement
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="datetime")
     */
    private $dateAjout;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime")
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=255)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="visibilite", type="boolean", options={"default":true})
     */
    private $visibilite;

    /**
     * @var bool
     *
     * @ORM\Column(name="important", type="boolean", options={"default":false})
     */
    private $important;
    
    /**
     * @ORM\OneToMany(targetEntity="UtilisateurEvenement", mappedBy="evenements")
     */
    private $utilisateurEvenements;

    /**
     * @ORM\ManyToMany(targetEntity="Partition", mappedBy="evenementPartitions")
     * @ORM\JoinTable(name="partition", joinColumns={@ORM\JoinColumn(name="partition_id", referencedColumnName="id", nullable=true)})
     */
    private $partitions;

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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Evenement
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Evenement
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return Evenement
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Evenement
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->utilisateurEvenements = new \Doctrine\Common\Collections\ArrayCollection();
        $this->partitions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateAjout = new \DateTime();
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Evenement
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Evenement
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
     * @return Evenement
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Evenement
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Evenement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add utilisateurEvenement
     *
     * @param \AppBundle\Entity\UtilisateurEvenement $utilisateurEvenement
     *
     * @return Evenement
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
     * Add partition
     *
     * @param \AppBundle\Entity\Partition $partition
     *
     * @return Evenement
     */
    public function addPartition(\AppBundle\Entity\Partition $partition)
    {
        $this->partitions[] = $partition;

        return $this;
    }

    /**
     * Remove partition
     *
     * @param \AppBundle\Entity\Partition $partition
     */
    public function removePartition(\AppBundle\Entity\Partition $partition)
    {
        $this->partitions->removeElement($partition);
    }

    /**
     * Get partitions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartitions()
    {
        return $this->partitions;
    }

    /**
     * Set visibilite
     *
     * @param boolean $visibilite
     *
     * @return Evenement
     */
    public function setVisibilite($visibilite)
    {
        $this->visibilite = $visibilite;

        return $this;
    }

    /**
     * Get visibilite
     *
     * @return boolean
     */
    public function getVisibilite()
    {
        return $this->visibilite;
    }

    /**
     * Set visibilite
     *
     * @param boolean $important
     *
     * @return Evenement
     */
    public function setImportant($important)
    {
        $this->important = $important;

        return $this;
    }

    /**
     * Get important
     *
     * @return boolean
     */
    public function getImportant()
    {
        return $this->important;
    }
}

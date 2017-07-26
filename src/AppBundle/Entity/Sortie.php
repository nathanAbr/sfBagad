<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sortie
 *
 * @ORM\Table(name="sortie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SortieRepository")
 */
class Sortie extends Evenement
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
     * @var float
     *
     * @ORM\Column(name="cachet", type="float")
     */
    private $cachet;

    /**
     * @var bool
     *
     * @ORM\Column(name="validation", type="boolean")
     */
    private $validation;

    /**
     * @var string
     *
     * @ORM\Column(name="repas", type="string", length=255)
     */
    private $repas;

    /**
     * @var bool
     *
     * @ORM\Column(name="tenue", type="boolean")
     */
    private $tenue;
    
    /**
    * @ORM\ManyToOne(targetEntity="Organisateur", inversedBy="sorties")
    * @ORM\JoinColumn(name="organisateur_id", referencedColumnName="id")
    */
    private $organisateur;

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
     * Set cachet
     *
     * @param float $cachet
     *
     * @return Sortie
     */
    public function setCachet($cachet)
    {
        $this->cachet = $cachet;

        return $this;
    }

    /**
     * Get cachet
     *
     * @return float
     */
    public function getCachet()
    {
        return $this->cachet;
    }

    /**
     * Set validation
     *
     * @param boolean $validation
     *
     * @return Sortie
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;

        return $this;
    }

    /**
     * Get validation
     *
     * @return bool
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * Set repas
     *
     * @param string $repas
     *
     * @return Sortie
     */
    public function setRepas($repas)
    {
        $this->repas = $repas;

        return $this;
    }

    /**
     * Get repas
     *
     * @return string
     */
    public function getRepas()
    {
        return $this->repas;
    }

    /**
     * Set tenue
     *
     * @param boolean $tenue
     *
     * @return Sortie
     */
    public function setTenue($tenue)
    {
        $this->tenue = $tenue;

        return $this;
    }

    /**
     * Get tenue
     *
     * @return bool
     */
    public function getTenue()
    {
        return $this->tenue;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sorties = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set organisateur
     *
     * @param \AppBundle\Entity\Organisateur $organisateur
     *
     * @return Sortie
     */
    public function setOrganisateur(\AppBundle\Entity\Organisateur $organisateur = null)
    {
        $this->organisateur = $organisateur;

        return $this;
    }

    /**
     * Get organisateur
     *
     * @return \AppBundle\Entity\Organisateur
     */
    public function getOrganisateur()
    {
        return $this->organisateur;
    }
}

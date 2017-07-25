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
     * @ORM\ManyToOne(targetEntity="Evenement", inversedBy="participants")
     */
    private $participant;

    /**
     * @ORM\OneToMany(targetEntity="Evenement", mappedBy="evenement")
     */
    private $evenements;

    /**
     * @ORM\OneToMany(targetEntity="Utilisateur", mappedBy="utilisateurEvenement")
     */
    private $utilisateurs;

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


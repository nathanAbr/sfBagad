<?php

namespace AppBundle\Entity\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="entity_utilisateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Entity\UtilisateurRepository")
 */
class Utilisateur
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
     * @ORM\OneToMany(targetEntity="Article", mappedBy="utilisateur")
     */
    private $articles;

    /**
     * @ORM\ManyToOne(targetEntity="Instrument", inversedBy="utilisateurs"})
     * @ORM\JoinColumn(name="instrument_id", referencedColumnName="id")
     */
    private $instrument;
    



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}


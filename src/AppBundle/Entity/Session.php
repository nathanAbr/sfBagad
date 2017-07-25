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
     * @ORM\OneToMany(targetEntity="Partition", mappedBy="sessionPartitions")
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
}


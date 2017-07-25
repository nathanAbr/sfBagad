<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partition
 *
 * @ORM\Table(name="partition")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartitionRepository")
 */
class Partition
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\ManyToMany(targetEntity="Evenement", inversedBy="partitions")
     */
    private $evenementPartitions;
    
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Partition
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
     * Constructor
     */
    public function __construct()
    {
        $this->partitions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add evenementPartition
     *
     * @param \AppBundle\Entity\Evenement $evenementPartition
     *
     * @return Partition
     */
    public function addEvenementPartition(\AppBundle\Entity\Evenement $evenementPartition)
    {
        $this->evenementPartitions[] = $evenementPartition;

        return $this;
    }

    /**
     * Remove evenementPartition
     *
     * @param \AppBundle\Entity\Evenement $evenementPartition
     */
    public function removeEvenementPartition(\AppBundle\Entity\Evenement $evenementPartition)
    {
        $this->evenementPartitions->removeElement($evenementPartition);
    }

    /**
     * Get evenementPartitions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvenementPartitions()
    {
        return $this->evenementPartitions;
    }
}

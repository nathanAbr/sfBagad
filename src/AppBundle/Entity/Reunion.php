<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reunion
 *
 * @ORM\Table(name="reunion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReunionRepository")
 */
class Reunion extends Evenement
{

}

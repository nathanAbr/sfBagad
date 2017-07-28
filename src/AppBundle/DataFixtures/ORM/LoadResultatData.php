<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Resultat;
use AppBundle\Entity\Concours;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadResultatData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $date = new \DateTime();
        $concours = new Concours();
        $concours->setTitre('Concours toffi');
        $concours->setVisibilite(true);
        $concours->setDateDebut($date->setDate(2017, 07, 25));
        $concours->setDateFin($date->setDate(2017, 07, 25));
        $concours->setAdresse('1101 Avenue jacques cartier');
        $concours->setCp('44800');
        $concours->setVille('Saint Herblain');
        $concours->setDescription('troegoiqbhvubqeiurvbq');
        $concours->setVisibilite(true);
        $concours->setImportant(true);

        $resultat = new Resultat();
        $resultat->setTitre('2nd place du concours toffi');
        $resultat->setDescription('palalalalal paliliklii');
        $resultat->setVisibilite(true);
        $resultat->setConcours($concours);

        $manager->persist($resultat);
        $manager->persist($concours);
        $manager->flush();
    }
}
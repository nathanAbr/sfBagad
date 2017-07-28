<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 28/07/2017
 * Time: 11:23
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Instrument;
use AppBundle\Entity\Session;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadRepetitionData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $date = new \DateTime();

        $instrument = new Instrument();
        $instrument->setLibelle('Caisse');

        $repetition = new Session();
        $repetition->setCp('44300');
        $repetition->setVille('Nantes');
        $repetition->setAdresse('45 rue de la gaudinière');
        $repetition->setDescription('lolololoo');
        $repetition->setDateFin($date->setDate(2017, 07, 29));
        $repetition->setDateDebut($date->setDate(2017, 07, 29));
        $repetition->setInstrument($instrument);
        $repetition->setImportant(true);
        $repetition->setVisibilite(true);
        $repetition->setProfesseur('Aladin');
        $repetition->setType('Repetition');
        $repetition->setTitre('C\'est une répétition');

        $manager->persist($instrument);
        $manager->persist($repetition);
        $manager->flush();
    }
}
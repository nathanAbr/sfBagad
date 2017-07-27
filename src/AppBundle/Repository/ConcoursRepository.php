<?php

namespace AppBundle\Repository;

/**
 * ConcoursRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ConcoursRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByCurrentMonth(){
        $nbJour = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        $query = $this->getEntityManager()->createQuery('SELECT c FROM AppBundle:Concours c WHERE c.dateDebut BETWEEN :date_debut AND :date_fin');
        $query->setParameter('date_debut', date('Y-m-01'));
        $query->setParameter('date_fin', date('Y-m-'.$nbJour));
        try {
            return $query->getArrayResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

}

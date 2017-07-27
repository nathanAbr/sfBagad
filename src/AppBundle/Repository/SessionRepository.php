<?php

namespace AppBundle\Repository;

/**
 * SessionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SessionRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByCurrentMonth($start, $end){
        $nbJour = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        $query = $this->getEntityManager()->createQuery('SELECT s FROM AppBundle:Session s WHERE s.dateDebut BETWEEN :date_debut AND :date_fin');
        $query->setParameter('date_debut', $start);
        $query->setParameter('date_fin', $end);
        try {
            return $query->getArrayResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

    public function findByTypeAndAjout($type){
        $query = $this->getEntityManager()->createQuery('SELECT s FROM AppBundle:Session s WHERE s.type = :type');
        $query->setParameter('type', $type);
        try {
            return $query->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}

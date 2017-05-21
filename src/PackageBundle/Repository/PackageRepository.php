<?php

namespace PackageBundle\Repository;

/**
 * PackageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PackageRepository extends \Doctrine\ORM\EntityRepository
{
	public function getAllPackages()
    {
        return $this->getEntityManager()->createQuery("
        	SELECT p FROM PackageBundle:Package p 
            WHERE p.deleted_at IS NULL  ORDER BY p.name ASC
        ")->getResult();
    }
}

<?php

namespace Acme\CmsBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PageRepository extends EntityRepository
{
    public function getSearchQueryBuilder($q)
    {
        $qb = $this->createQueryBuilder('a');

        return $qb;
    }
}

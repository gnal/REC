<?php

namespace Rec\MainBundle\Entity;

use Gedmo\Tree\Entity\Repository\NestedTreeRepository;

class ArtworkCategoryRepository extends NestedTreeRepository
{
    use \Msi\AdminBundle\Entity\EntityRepositoryMethods;
}

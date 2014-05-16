<?php

namespace Rec\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route("/nav/main")
     * @Template()
     */
    public function navAction()
    {
        $qb = $this->getDoctrine()->getRepository('RecMainBundle:ArtworkCategory')->createQueryBuilder('a');
        $qb->andWhere($qb->expr()->eq('a.lvl', ':lvl'));
        $qb->setParameter('lvl', 0);
        $qb->leftJoin('a.children', 'children');
        $qb->orderBy('a.position', 'ASC');
        $qb->addOrderBy('children.position', 'ASC');

        $categories = $qb->getQuery()->execute();

        return [
            'categories' => $categories,
        ];
    }
}

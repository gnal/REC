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
        $categories = $this->getDoctrine()->getRepository('RecMainBundle:ArtworkCategory')->findBy(
            [
                'lvl' => 0,
            ],
            [
                'position' => 'ASC',
            ]
        );

        return [
            'categories' => $categories,
        ];
    }
}

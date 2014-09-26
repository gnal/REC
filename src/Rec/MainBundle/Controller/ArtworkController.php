<?php

namespace Rec\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ArtworkController extends Controller
{
    /**
     * @Route("/portfolio/{c}/")
     * @Template()
     */
    public function indexAction()
    {
        $category = $this->getDoctrine()->getRepository('RecMainBundle:ArtworkCategory')->findOneBy(
            [
                'published' => true,
                'id' => $this->getRequest()->attributes->get('c'),
            ]
        );

        if (!$category) {
            throw $this->createNotFoundException();
        }
        // if the category has children, we fetch instead all the artworks of the first child
        if ($category->getChildren()->count()) {
            $category = $category->getChildren()->first();
        }

        $artworks = $this->getDoctrine()->getRepository('RecMainBundle:Artwork')->findBy(
            [
                'published' => true,
                'category' => $category,
            ],
            [
                'position' => 'ASC',
            ]
        );

        return [
            'artworks' => $artworks,
            'category' => $category,
        ];
    }
}

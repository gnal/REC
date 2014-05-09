<?php

namespace Acme\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeCmsBundle:Default:index.html.twig', array('name' => $name));
    }
}

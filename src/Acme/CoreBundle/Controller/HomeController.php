<?php

namespace Acme\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function homeAction()
    {
        $parameters['played'] = (time() - strtotime('2011-06-01')) / 60 / 60 / 24;

        $parameters['played'] = $parameters['played'] / 7 * 5 * 8;

        $parameters['cups'] = $parameters['played'] / 8 * 2;

        $parameters['played'] = round($parameters['played']);
        $parameters['cups'] = round($parameters['cups']);

        return $this->render('AcmeCoreBundle:Home:home.html.twig', $parameters);
    }
}

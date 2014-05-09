<?php

namespace Acme\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    public function contactAction()
    {
        return $this->render('AcmeCoreBundle:Contact:contact.html.twig');
    }
}

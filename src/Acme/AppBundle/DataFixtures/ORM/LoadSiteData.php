<?php

namespace Acme\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadSiteData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    protected $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $class = $this->container->getParameter('msi_cms.site.class');
        $site = new $class;
        $site->setHost('dev.acme.com');
        $site->setIsDefault(true);
        $site->setLocale('fr');
        $site->setLocales([
            'fr', 'en',
        ]);
        $this->addReference('site1', $site);
        $this->container->get('doctrine')->getManager()->persist($site);
        // FLUSH
        $this->container->get('doctrine')->getManager()->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}

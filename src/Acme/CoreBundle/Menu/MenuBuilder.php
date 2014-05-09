<?php

namespace Acme\CoreBundle\Menu;

use Knp\Menu\FactoryInterface;
use Msi\AdminBundle\Menu\BaseMenuBuilder;

class MenuBuilder extends BaseMenuBuilder
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $this->getMenu('main');

        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        return $this->execute($menu);
    }

    public function sidebarMenu(FactoryInterface $factory, array $options)
    {
        $menu = $this->getMenu('main');

        $menu->setChildrenAttribute('class', 'nav');

        return $this->execute($menu);
    }
}

<?php

namespace Rec\MainBundle\Admin;

use Msi\AdminBundle\Admin\Admin;
use Msi\AdminBundle\Grid\Grid;
use Symfony\Component\Form\FormBuilder;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("rec_main_artwork_admin", parent="msi_admin.admin")
 * @DI\Tag("msi.admin")
 */
class ArtworkAdmin extends Admin
{
    public function configure()
    {
        $this->class = 'Rec\MainBundle\Entity\Artwork';
        $this->setParent($this->container->get('rec_main_artwork_category_admin'));
    }

    public function buildGrid(Grid $builder)
    {
        $builder
            ->add('published', 'boolean')
            ->add('image', 'image')
        ;
    }

    public function buildForm(FormBuilder $builder)
    {
        $builder
            ->add('published')
            ->add('imageFile', 'file')
            ->add('description', 'textarea')
        ;
    }
}

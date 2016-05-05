<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class JamJarAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper->add('type', 'entity', array(
            'class' => 'AppBundle\Entity\Type',
            'property' => 'name',
        ))->add('year', 'entity', array(
            'class' => 'AppBundle\Entity\Year',
            'property' => 'name',
        ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        /*
        $datagridMapper->add('year', 'entity', array(
            'class' => 'AppBundle\Entity\Year',
            'property' => 'name',
        ));
        */
    }

    protected function configureListFields(ListMapper $listMapper)
    {

        $listMapper->addIdentifier('type.name')->add('year.name');

    }
}
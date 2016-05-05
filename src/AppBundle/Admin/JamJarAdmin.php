<?php

namespace AppBundle\Admin;

use AppBundle\Entity\JamJar;
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
        ))->add('comment', 'text');

        //if we crate object
        if (!($this->getSubject()->getId())) {
            $formMapper->add('amount', 'text', array('mapped'=>false,  'data' => "1"));
        }


    }

    public function prePersist($object)
    {
        $type      = $this->getForm()->get('type')->getData();
        $year      = $this->getForm()->get('year')->getData();
        $comment   = $this->getForm()->get('comment')->getData();
        $amount    = $this->getForm()->get('amount')->getData();

        $em = $this->getModelManager()->getEntityManager($this->getSubject());

        for ($i = 1; $i < $amount; $i++) {
            $jamJar = new JamJar();
            $jamJar->setType($type);
            $jamJar->setYear($year);
            $jamJar->setComment($comment);

            $em->persist($jamJar);
            $em->flush($jamJar);
        }
    }


    protected function configureListFields(ListMapper $listMapper)
    {

        $listMapper->addIdentifier('type.name')->add('year.name');

    }
}
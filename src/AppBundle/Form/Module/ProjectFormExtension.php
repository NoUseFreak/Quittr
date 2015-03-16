<?php

namespace AppBundle\Form\Module;

use Clastic\NodeBundle\Form\Extension\AbstractNodeTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * ProjectTypeExtension
 */
class ProjectFormExtension extends AbstractNodeTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->findTab($builder, 'general')
            ->add('description', 'wysiwyg')
            ->add('links', 'collection', array(
                'type' => 'link',
                'allow_add' => true,
                'allow_delete' => true,
            ));
    }
}

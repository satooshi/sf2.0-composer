<?php

namespace Satooshi\Bundle\PersonBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PersonType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email')
            ->add('isMarried')
            ->add('friends')
        ;
    }

    public function getName()
    {
        return 'satooshi_bundle_personbundle_persontype';
    }
}

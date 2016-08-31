<?php

namespace MyFrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SquadType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('filenameee', 'file', array('data_class' => null,  'attr' => array('accept' => 'image/jpeg,image/png')))
//            ->add('mimeee')
//            ->add('contentsss')
            ->add('descriptionnn')
            ->add('name')
            ->add('info')
            ->add('position')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyFrontendBundle\Entity\Squad'
        ));
    }
}

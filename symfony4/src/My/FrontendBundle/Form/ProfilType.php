<?php

namespace My\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilType extends AbstractType
{
//    /**
//     * @param FormBuilderInterface $builder
//     * @param array $options
//     */
//    public function buildForm(FormBuilderInterface $builder, array $options)
//    {
//        $builder
//            ->add('info')
//        ;
//    }
//
//    /**
//     * @param OptionsResolver $resolver
//     */
//    public function configureOptions(OptionsResolver $resolver)
//    {
//        $resolver->setDefaults(array(
//            'data_class' => 'My\FrontendBundle\Entity\Profil'
//        ));
//    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('info', 'text', array('label' => 'Informacja o użytkowniku'))
        ;
    }

    public function getName()
    {
        return 'my_frontendbundle_profiltype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'My\FrontendBundle\Entity\Profil',
        );
    }
}

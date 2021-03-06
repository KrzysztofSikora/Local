<?php

namespace MyFrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entity = $builder->getData();
//        $v = $entity->getFieldType()->getFieldType();
        $v = $entity->getContents();
//        print_r($v);
        $builder
//            ->add('filename')
//            ->add('mime')
//            ->add('contents')
            ->add('filename', 'file', array('data_class' => null))
//            ->add('filename', 'hidden', array('data_class' => null))
//            ->add('album')
            ->add('description')
            ->add('status', null, array('label' => 'Karuzela'))
            ->add('album')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyFrontendBundle\Entity\Image'
        ));
    }
}

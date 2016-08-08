<?php

namespace MyFrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use MyFrontendBundle\Entity\ContactDetails;

class ContactDetailsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


//
//        $flag = 1;
//        if ($flag == 0) { $builder
//            ->add('isDeleted')
//            ->add('value', EmailType::class)
//
//        ;
//        }

//        if ($flag == 1) {
        $builder
            ->add('isDeleted')
            ->add('value')
//            ->add('value', EmailType::class)
//            ->add('fieldType') // requires convert to string
//            ->add('contact') // requires convert to string
        ;
//        }
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyFrontendBundle\Entity\ContactDetails'
        ));
    }
}

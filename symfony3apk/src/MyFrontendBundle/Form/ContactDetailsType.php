<?php

namespace MyFrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;






use MyFrontendBundle\Entity\ContactDetails;

class ContactDetailsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {



        $entity = $builder->getData();
//        $v = $entity->getID();
        $v = $entity->getfieldtype() ->getID();
        print_r($v);
        $flag = $v;

//        if($flag ==1) {
//        $builder
//            ->add('isDeleted')
//            ->add('value' ) // tutaj np. email class lub number class...
//
//            ->add('fieldType') // requires convert to string
//            ->add('contact') // requires convert to string
//        ;
//    } phone
//        if($flag==2) {
//        $builder
//            ->add('isDeleted')
//            ->add('value' => range(1,4))
//
//            )
//
//
//            ->add('fieldType') // requires convert to string
//            ->add('contact') // requires convert to string
//        ;
//
//    } //mobile
        if($flag==3) {
            $builder
                ->add('isDeleted')
                ->add('value', EmailType::class ) // tutaj np. email class lub number class...

                ->add('fieldType') // requires convert to string
                ->add('contact') // requires convert to string
            ;

        }

        if($flag==4) {
            $builder
                ->add('isDeleted')
                ->add('value', UrlType::class ) // tutaj np. email class lub number class...

                ->add('fieldType') // requires convert to string
                ->add('contact') // requires convert to string
            ;

        } //homepage

        if($flag==5) {
            $builder
                ->add('isDeleted')
                ->add('value') // tutaj np. email class lub number class...

                ->add('fieldType') // requires convert to string
                ->add('contact') // requires convert to string
            ;

        }
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyFrontendBundle\Entity\ContactDetails',

        ));
    }
}

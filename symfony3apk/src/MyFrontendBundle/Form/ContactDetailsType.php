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
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;






use MyFrontendBundle\Entity\ContactDetails;

class ContactDetailsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {



//        $entity = $builder->getData();
////        $v = $entity->getID();
//        $v = $entity->getValue();
//        print_r($v);
//        $flag = $v;


        $builder
            ->add('isDeleted')
            ->add('value') // tutaj np. email class lub number class...

            ->add('fieldType') // requires convert to string
            ->add('contact') // requires convert to string
        ;
//        //SZUKAM POWIĄZANEGO FIELD TYPE i JEGO WARTOŚCI
//        $fieldType = $builder->getData()->getId();
//        print_r($fieldType);
//       if ($fieldType == 3) {
//
//                $builder
//                    ->add('isDeleted')
//                    ->add('fieldType')
//                    ->add('contact')
//                    ->add('value', TextType::class, [
//                        'constraints' => [
//                            //TWOJE WALIDACJE DLA DANEGO POLA
//                            new \Symfony\Component\Validator\Constraints\NotBlank(),
//                            new \Symfony\Component\Validator\Constraints\Email()
//                        ],
//                    ]);
//
////
//        }






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

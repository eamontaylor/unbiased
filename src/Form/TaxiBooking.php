<?php

namespace App\Form;

use App\Entity\Taxi;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TaxiBooking extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', TextType::class)
            ->add('mobileNumber', TelType::class)
            ->add('dateOfArrival', DateType::class, array(
                'widget' => 'single_text',
            ))
            ->add('airport', ChoiceType::class, array(
                'choices' => array(
                    'Heathrow' => 'heathrow',
                    'Gatwick' => 'gatwick',
                ),
//              'choice_attr' => function($key, $value) {
//                    if ($value == 'heathrow') {
//                        'choices' => array(
//                            'Terminal 1' => 'terminla1',
//                        )
//                    }
//                },
            ))
            ->add('flightNumber', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Book Taxi'));
    }
}
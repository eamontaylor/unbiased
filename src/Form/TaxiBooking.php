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
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use libphonenumber\PhoneNumberFormat;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;

class TaxiBooking extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', TextType::class)
            ->add('mobileNumber', PhoneNumberType::class, array(
                'default_region' => 'GB',
                //'widget' => PhoneNumberType::WIDGET_COUNTRY_CHOICE,
                'country_choices' => array('GB'),
               // 'preferred_country_choices' => array('GB')
            ))
            ->add('dateOfArrival', DateType::class, array(
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker'],
            ))
            ->add('airport', ChoiceType::class, array(
                'choices' => array(
                    'Heathrow' => 'heathrow',
                    'Gatwick' => 'gatwick',
                ),

            ))
            ->add('flightNumber', TextType::class);

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $form = $event->getForm();

                $form->add('terminal', ChoiceType::class, array(
                    'choices' => array(
                        'Terminal1' => 'terminal1',
                        'Terminal2' => 'terminal2',
                        'Terminal3' => 'terminal3',
                        'Terminal4' => 'terminal4',
                        'notSure' => 'terminal4',

                    ),
                ));
            }
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Taxi::class,
        ]);
    }
}
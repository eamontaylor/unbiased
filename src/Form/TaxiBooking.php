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

class TaxiBooking extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', TextType::class, array(
                'label' => 'Full Name',
            ))
            ->add('mobileNumber', TextType::class, array(
                'label' => 'Mobile Number',
            ))
            ->add('dateOfArrival', DateType::class, array(
                'label' => 'Date of Arrival',
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd-MM-yyyy',
                'attr' => ['class' => 'js-datepicker'],
            ))
            ->add('airport', ChoiceType::class, array(
                'label' => 'Select Airport',
                'placeholder' => 'Select',
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
                    'label' => false,
                    'placeholder' => 'Choose Terminal',
                    'empty_data' => 'notsure',
                    'choices' => array(
                        'Not sure' => 'notsure',
                        'Terminal 1' => 'terminal1',
                        'Terminal 2' => 'terminal2',
                        'Terminal 3' => 'terminal3',
                        'Terminal 4' => 'terminal4',
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
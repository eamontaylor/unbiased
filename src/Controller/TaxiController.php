<?php

namespace App\Controller;

use App\Entity\Taxi;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\TaxiBooking;

class TaxiController extends AbstractController
{
    /**
     * @Route("/taxi", name="taxi")
     */
    public function new(Request $request)
    {
        $taxi = new Taxi();
        $form = $this->createForm(TaxiBooking::class, $taxi);
        $form->add('submit', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($form->getData());
             $entityManager->flush();

            $mailer = new Swift_Mailer();

            // Create the message
            $message = (new \Swift_Message('Unbiased Airport Taxis'))
                ->setFrom(['eamonweb@gmail.com' => 'Eamon Taylor'])
                ->setTo('eamonweb@gmail.com')
                ->setBody($this->renderView('emails/booking.html.twig'),'text/html');

            $mailer->send($message);

            return $this->redirectToRoute('taxi');
        }

        return $this->render('taxi/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}

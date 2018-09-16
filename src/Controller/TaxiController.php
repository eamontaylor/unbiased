<?php

namespace App\Controller;

use App\Entity\Taxi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
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


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $taxi = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            return $this->redirectToRoute('task_success');
        }

        return $this->render('taxi/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}

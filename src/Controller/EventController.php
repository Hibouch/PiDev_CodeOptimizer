<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;

class EventController extends AbstractController
{


    /**
     * @Route("/eventfront", name="eventfront")
     */
    public function new1(Request $request)
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->add('save', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($event);
            $entityManager->flush();

            return $this->redirectToRoute('lol3');

        }
        return $this->render('event/new.html.twig', [
            'event' => $event,
            'form' => $form->createView(),
        ]);
    }

    /** //
     *
     * @Route("/yahala2", name="yahala2")
     */
    public function index2(): Response
    {
        return $this->render('event/yahala2.html.twig', [
            'controller_name' => 'EVENTController',
        ]);
    }


    /**
     * @Route("/lol3", name="lol3")
     */
    public function manager(): Response
    {

        $rep = $this->getDoctrine()->getRepository(Event::class);
        $event = $rep->findAll();


        return $this->render('event/eventmanager.html.twig', [
            'event' => $event,
        ]);
    }

    /**
     * @Route("/event_index", name="event_index")
     */
    public function index3(EventRepository $eventRepository): Response
    {
        return $this->render('event/index.html.twig', [
            'event' => $eventRepository->findAll(),
        ]);
    }

    /**
     * @Route("/eventeditm{id}", name="eventeditm")
     */
    public function edit(Request $request, Event $event)
    {
        $form = $this->createForm(EventType::class, $event);
        $form->add('save', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lol3');
        }

        return $this->render('event/edit.html.twig', [
            'event' => $event,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/event_show{id}", name="event_show")
     */
    public function show(int $id): Response
    {
        $rep = $this->getDoctrine()->getRepository(Event::class);
        $entityManager = $this->getDoctrine()->getManager();

        $event = $rep->find($id);


        return $this->render('event/show.html.twig', [
            'event' => $event,
        ]);
    }

    /**
     * @Route("/event_detele{id}", name="event_delete")
     */
    public function delete(Request $request, Event $event): Response
    {
        if ($this->isCsrfTokenValid('delete' . $event->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($event);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lol3');
    }

    /**
     * @Route("/eventa", name="eventa")
     */
    public function new2(Request $request)
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->add('save', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($event);
            $entityManager->flush();

            return $this->redirectToRoute('lol3');

        }
        return $this->render('event/ajoutmanager.html.twig', [
            'event' => $event,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/sortbytitleasc1", name="sortbytitleasc1")
     */
    public function sortByTitleASC(): Response
    {

        $rep = $this->getDoctrine()->getRepository(Event::class);
        $event = $rep->sortByTitleASC();


        return $this->render('event/eventmanager.html.twig', [
            'event' => $event,
        ]);
    }

    /**
     * @Route("/listu2", name="listu2", methods={"GET"})
     */
    public function listu1(EventRepository $eventRepository): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('event\pdf.html.twig', [
            'event' => $eventRepository->findAll(),
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A2', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
    }
    /**
     * @Route("/front_event", name="Afficher_front")
     */
    public function afficher_front(Request $request)
    {
        dump($request);
        $get_sites = $this->getDoctrine()->getRepository(event::class);
        $site = $get_sites->findAll();

        return $this->render('event/Rating.html.twig',
            ['liste' => $site]);
    }
    /**
     * @Route("/rate_site",name="rating_camping")
     */
    function rating_camping(Request $request)
    {
        if ($request->request->count()>0) {
            $rate = $request->request->get('rating');
            $entityManager = $this->getDoctrine()->getManager();
            $get_sites = $entityManager->getRepository(event::class);
            $site = $get_sites->find($request->request->get('id_rate'));
            $site->setEventRating($site->getEventRating()+1);
            if(!$site->getAverageRating())
                $site->setAverageRating($rate);
            else
                $site->setAverageRating(($site->getAverageRating()+$rate));
            $entityManager->flush();

            return $this->redirectToRoute("Afficher_front");
        }
        throw $this->createNotFoundException(
            'error' . $request->request->get('id_rate')
        );
    }
}

<?php

namespace App\Controller;

use App\Entity\News;
use App\Repository\NewsRepository;

use App\Form\NewsType;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NewsController extends AbstractController
{

    /**
     * @Route("/lol4", name="lol4")
     */
    public function manager(): Response
    {

        $rep=$this->getDoctrine()->getRepository(News::class);
        $news=$rep->findAll();



        return $this->render('news/newsmanager.html.twig', [
            'news' => $news,
        ]);
    }
    /**
     * @Route("/news_index", name="news_index")

     */
    public function index3(NewsRepository $newsRepository): Response
    {
        return $this->render('news/index.html.twig', [
            'news' => $newsRepository->findAll(),
        ]);
    }
    /**
     * @Route("/newseditm{id}", name="newseditm")
     */
    public function edit(Request $request, News $news)
    {
        $form = $this->createForm(NewsType::class, $news);
        $form->add('save',SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lol4');
        }

        return $this->render('news/edit.html.twig', [
            'news' => $news,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/news_show{id}", name="news_show")
     */
    public function show(int $id): Response
    {
        $rep=$this->getDoctrine()->getRepository(News::class);
        $entityManager = $this->getDoctrine()->getManager();

        $news=$rep->find($id);


        return $this->render('news/show.html.twig', [
            'news' => $news,
        ]);}
    /**
     * @Route("/news_detele{id}", name="news_delete")
     */
    public function delete(Request $request, News $news): Response
    {
        if ($this->isCsrfTokenValid('delete'.$news->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($news);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lol4');
    }
    /**
     * @Route("/newsa", name="newsa")
     */
    public function new2(Request $request)
    {
        $news =new News();
        $form = $this->createForm(NewsType::class, $news);
        $form->add('save',SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($news);
            $entityManager->flush();

            return $this->redirectToRoute('lol4');

        }
        return $this->render('news/ajoutmanager.html.twig', [
            'news' => $news,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/sortbytitleasc", name="sortbytitleasc")
     */
    public function sortByTitleASC(): Response
    {

        $rep=$this->getDoctrine()->getRepository(News::class);
        $news=$rep->sortByTitleASC();


        return $this->render('news/newsmanager.html.twig', [
            'news' => $news,
        ]);
    }
    /**
     * @Route("/listu1", name="listu1", methods={"GET"})
     */
    public function listu1(NewsRepository $newsRepository): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('news\pdf.html.twig', [
            'news' =>$newsRepository->findAll(),
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

}

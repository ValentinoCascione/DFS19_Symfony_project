<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(MovieRepository $movieRepo): Response
    {
        if (!$this->getUser()) return $this->redirectToRoute('app_login');

        return $this->render('home/index.html.twig', [
            'movies' => $movieRepo->findAll(),
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {
        if (!$this->getUser()) return $this->redirectToRoute('app_login');

        return $this->render('home/about.html.twig');
    }
}

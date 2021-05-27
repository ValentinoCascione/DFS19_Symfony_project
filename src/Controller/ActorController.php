<?php

namespace App\Controller;

use App\Repository\ActorRepository;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActorController extends AbstractController
{
    /**
     * @Route("/actor/{id}", name="actor")
     */
    public function index($id, MovieRepository $movieRepo, ActorRepository $actorRepo): Response
    {
        return $this->render('actor/index.html.twig', [
            'movies' => $movieRepo->getMoviesByActor($id),
            'actor' => $actorRepo->find($id)
        ]);
    }
}

<?php

namespace App\Controller;

use App\Repository\GenreRepository;
use App\Repository\MovieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GenreController extends AbstractController
{
    /**
     * @Route("/genre/{id}", name="genre")
     */
    public function index($id, MovieRepository $movieRepo, GenreRepository $genreRepo): Response
    {
        return $this->render('genre/index.html.twig', [
            'movies' => $movieRepo->getMoviesByGenre($id),
            'genre' => $genreRepo->find($id)
        ]);
    }
}

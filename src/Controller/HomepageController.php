<?php

namespace App\Controller;

use App\Entity\Artwork;
use App\Repository\ArtworkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/homepage', name: 'app_homepage')]
    public function index(ArtworkRepository $repository): Response
    {
        $artworks = $repository->findAll();
        return $this->render('homepage/index.html.twig', [
        'artworks' => $artworks
        ]);
    }
    #[Route('/show/{id}', name: 'app_showArtwork')]
    public function singleArtworkById(Artwork $artwork)
    {
        return $this->render('artwork/show.html.twig', [
            'artwork' => $artwork,
        ]);
    }
}


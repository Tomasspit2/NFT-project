<?php

namespace App\Controller;

use App\Entity\Artwork;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/homepage', name: 'app_homepage')]
    public function index(Artwork $artwork): Response
    {
        return $this->render('homepage/index.html.twig', [
            'artwork' => $artwork,
        ]);
    }

    #[Route('/show/{id}', name: 'app_singleArtwork')]
    public function singleArtworkById(Artwork $artwork): Response
    {
        return $this->render('artwork/show.html.twig', [
            'artwork' => $artwork,
        ]);
    }
}


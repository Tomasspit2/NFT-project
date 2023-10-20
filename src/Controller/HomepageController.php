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

    #[Route('/cart', name: 'app_cart')]
    public function showCart()
    {
        // Here you can process any data you need for the cart page.
        // For example, if you stored cart data in the database, you could retrieve it here.
        // For now, as an example, we'll retrieve the cart data from localStorage via JavaScript in the template.

        return $this->render('cart/cart.html.twig');
    }


}


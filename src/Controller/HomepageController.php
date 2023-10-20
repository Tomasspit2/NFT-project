<?php

namespace App\Controller;

use App\Entity\Artwork;
use App\Repository\ArtworkRepository;
use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(ArtworkRepository $repository): Response
    {
        $artworks = $repository->findAll();

        $guzzleClient = new Client(['verify' => false]);

        $response = $guzzleClient->request('GET', 'https://api.opensea.io/api/v2/collections', [
            'headers' => [
                'accept' => 'application/json',
                'x-api-key' => '63d0ff0d4f5f40fe92e3a1c1677175ef',
            ],
        ]);

        $responseContent = $response->getBody()->getContents();

        // Convert the JSON response to a PHP array
        $nftsArray = json_decode($responseContent, true);

        return $this->render('homepage/index.html.twig', [
            'artworks' => $artworks,
            'nfts' => $nftsArray
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


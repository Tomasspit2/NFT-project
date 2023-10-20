<?php

namespace App\Controller;

use App\Entity\User;
use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    #[Route('/artist/{id}', name: 'app_artist')]
    public function getArtistById(User $user): Response
    {
        $guzzleClient = new Client(['verify' => false]);


        $nftCollections = $user->getNftCollections();

        foreach ($nftCollections as $collection) {
           $collection = $collection->getName();


        $url = 'https://api.opensea.io/api/v2/collections/' . $collection;

        $response = $guzzleClient->request('GET', $url, [
            'headers' => [
                'accept' => 'application/json',
                'x-api-key' => '63d0ff0d4f5f40fe92e3a1c1677175ef',
            ],
        ]);

        $responseContent = $response->getBody()->getContents();

        // Convert the JSON response to a PHP array
        $nftsArray = json_decode($responseContent, true);
        }

        return $this->render('artistpage/artist.html.twig', [
            'artist' => $user,
            'nftCollection' => $nftsArray
        ]);
    }
}

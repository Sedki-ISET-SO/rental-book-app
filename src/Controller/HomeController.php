<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Listing;
use App\Repository\ListingRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", methods={"GET"}, name="home")
     * @Route("/", methods={"GET"}, name="index")
     */
    public function index(): Response
    {
        $listingRepository = $this->getDoctrine()->getRepository(Listing::class);
        $listings = $listingRepository->getListings();
        
        return $this->render('home/index.html.twig', [
            'listings' => $listings,
        ]);
    }
}
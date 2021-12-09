<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Listing;
use App\Form\ListingType;
use App\Form\RegistrationFormType;
use App\Repository\ListingRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("IS_AUTHENTICATED_FULLY")
 */
class ListingController extends AbstractController
{

    /**
     * @Route("/home/listing/{id}", methods={"GET", "POST"}, name="single", requirements={"id"="\d+"})
     */
    public function single(int $id=1, Listingrepository $listingRepository, Request $request): Response
    {
        $listing = $listingRepository->getSingleListing($id);

        return $this->render('home/single.html.twig', [
            "listing" => $listing
        ]);
    }
    
    /**
     * @Route("/home/rules", methods={"GET"}, name="rules")
     */
    public function rules(): Response
    {
        return $this->render('home/rules.html.twig', [
        ]);
    }

    /**
     * @Route("/home/listing/new", methods={"GET", "POST"}, name="newListing")
     */
    public function newListing(Request $request): Response
    {
        $listing = new Listing();
        $form = $this->createForm(ListingType::class, $listing);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            $listing->setPublished(new \DateTime());
            $listing->setUser($this->getUser());
            
            $entityManager = $this->getDoctrine()->getManager();
            foreach ($form->getData()->getPictures() as $pic) {
                $entityManager->persist($pic);

                $listing->addPicture($pic);
            }

            foreach ($form->getData()->getListingAvailabilities() as $availability) {
                $entityManager->persist($availability);

                $listing->addListingAvailability($availability);
            }

            foreach ($form->getData()->getListingAmenities() as $amenity) {
                $entityManager->persist($amenity);

                $listing->addListingAmenity($amenity);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($listing);
            $entityManager->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('home/newListing.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/user/listings", methods={"GET"}, name="userListings")
     */
    public function userListings(): Response
    {
        $listings = $this->getUser()->getListings();

        return $this->render('home/index.html.twig', [
            "listings" => $listings
        ]);
    }

    /**
     * @Route("/user/profil", methods={"GET", "POST"}, name="userProfil")
     */
    public function userProfil(): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(RegistrationFormType::class, $user);

        return $this->render('home/userProfil.html.twig', [
            "form" => $form->createView()
        ]);
    }
}

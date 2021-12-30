<?php

namespace App\Controller;

use App\Entity\Listing;
use App\Form\ListingType;
use App\Entity\ListingPicture;
use App\Form\ListingPictureType;
use App\Form\RegistrationFormType;
use App\Repository\ListingRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

        return $this->render('listing/single.html.twig', [
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

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($listing);
            $entityManager->flush();

            // return $this->redirectToRoute('index');
            return $this->render('listing/listingPictures.html.twig', ['id' => $id = $listing->getId()]);
        }

        return $this->render('listing/newListing.html.twig', [
            "form" => $form->createView()
        ]);
    }


    /**
     * @Route("/home/listing/new/picture", methods={"GET", "POST"}, name="newListingPicture")
     */
    public function newListingPicture(Request $request): Response
    {
        $listingPicture = new ListingPicture();
        $form = $this->createForm(ListingPictureType::class, $listingPicture);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            $listingPicture->setName("file");
            
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($listingPicture);
            $entityManager->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('listing/ListingPictures.html.twig', [
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

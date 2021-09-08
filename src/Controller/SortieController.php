<?php

namespace App\Controller;

use App\Entity\Sorties;
use App\Form\SortieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/sortie", name="sortie")
 */

class SortieController extends AbstractController
{
    /**
     * @Route("", name="sortie")
     */
    public function index(): Response
    {
        return $this->render('sortie/index.html.twig', [
            'controller_name' => 'SortieController',
        ]);
    }

    /**
     * @Route("/creer", name="_creer")
     */
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $sortie = new Sorties();
        $form = $this ->createForm(SortieType::class,$sortie);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
        $sortie->setNom();
        $sortie->setDatedebut();
        $sortie->setDuree();
        $sortie->dateCloture();
        $sortie->setNbinscriptionmax();
        $sortie->setOrganisateur();
        $sortie->setLieuxNoLieu();
        $sortie->setEtatsNoEtat();

        $em->persist($sortie);
        $em->flush();

        return $this->redirectToRoute("??"); // TO DO choisir une route de redirection//
        }
        return $this->render('sortie/creer.html.twig', [
            "SortieType"=>$form->createView()
        ]);
    }
}



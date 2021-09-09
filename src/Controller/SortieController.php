<?php

namespace App\Controller;

use App\Entity\Lieux;
use App\Entity\Participants;
use App\Entity\Sorties;
use App\Entity\Villes;
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
        $repo=$this->getDoctrine()->getRepository(Sorties::class); // accède aux données du repository
//        $participant = new Participants($repo->find($pseudo));
        //$participant = $repo->find($pseudo); // récupère pseudo de l'utilisateur connecté

        $sortie = new Sorties();
       // $lieu = new Lieux();
        $ville = new Villes();
        $lieu = $repo->findAll();

        $form = $this ->createForm(SortieType::class,$sortie);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // Récupère les infos rentrées par l'utilisateur
           $sortie->setNom($sortie->getNom());
           $sortie->setDatedebut($sortie->getDatedebut());
           $sortie->setDuree($sortie->getDuree());
           $sortie->setDatecloture($sortie->getDatecloture());
           $sortie->setNbinscriptionmax($sortie->getNbinscriptionmax());
           $sortie->setDescriptioninfos($sortie->getDescriptioninfos());
           $sortie->setOrganisateur($this->getUser()->getId()); // récupère l'id du user connecté
            $sortie->setLieuxNoLieu($lieu);

            $sortie->setRue($lieu->getRue());
            $sortie->setCodePostal($ville->getCodePostal());
            $sortie->setLatitude($lieu->getLatitude());
            $sortie->setLongitude($lieu->getLongitude());
           $sortie->setEtatsNoEtat(0);

        $em->persist($sortie);
        $em->flush();
        $this->addFlash("message","Votre sortie est bien créée !");

        return $this->redirectToRoute('sortie'); // TO DO choisir une route de redirection//
        }
        return $this->render('sortie/creer.html.twig', [
            "formSortie"=>$form->createView()
        ]);
    }
}



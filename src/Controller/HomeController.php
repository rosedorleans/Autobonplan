<?php

namespace App\Controller;

use App\Repository\MarqueRepository;
use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("", name="index")
     */
    public function index(VoitureRepository $voitureRepository, MarqueRepository $marqueRepository): Response
    {
        // Recuperer toutes les données des voitures et des marques
        $voitures = $voitureRepository->findAll();
        $marques = $marqueRepository->findAll();

        // Creer des tableaux pour classer les données
        $marqueColor = [];
        $marqueCount = [];
        $voitureCount = [];
        $dates = [];

        // Recuperer les données de marque et de couleur pour chaque voiture
        foreach ($marques as $marque) {
            $marquesNom[] = $marque->getNom();
            $marqueColor[] = $marque->getCouleur();
            $marqueCount[] = count($marque->getVoitures());
        }

        // Classer les voitures par date (mois et année)
        $voitureParMois = $voitureRepository->countByMonth();

        // Recuperer les données de dates et de compteur pour chaque voiture
        foreach ($voitureParMois as $voiture) {
            $voitureCount[] = $voiture['count'];
            $dates[] = $voiture['dateVoitures'];
        }

//        $voitureParMarque = $voitureRepository->countByMarque();
//
//        foreach ($voitureParMarque as $marque) {
//            $marquesCount[] = $marque['count'];
//            $marquesParVoiture[] = $marque['marqueVoiture'];
//        }

        // Envoyez ces données à la vue
        return $this->render('pages/index.html.twig', [
            'voitures' => $voitures,
            'marques' => $marques,
            'marquesNom' => $marquesNom,
//            'marqueParVoiture' => json_encode($marquesParVoiture),
//            'marquesCount' => json_encode($marquesCount),
            'marqueColor' => json_encode($marqueColor),
            'voitureCount' => json_encode($voitureCount),
            'dates' => json_encode($dates),

        ]);
    }
}

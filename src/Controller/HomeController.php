<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("", name="index")
     */
    public function index(VoitureRepository $voitureRepository): Response
    {
        $voitures = $voitureRepository->findAll();

        $voituresMarque = [];
        $voituresColor = [];
        $voituresCount = [];
        $dates = [];

        $voitureParMois = $voitureRepository->countByMonth();

        foreach ($voitures as $voiture) {
            $voituresMarque[] = $voiture->getMarque()->getNom();
            $voituresColor[] = $voiture->getMarque()->getCouleur();

        }

        foreach ($voitureParMois as $voiture) {
            $voituresCount[] = $voiture['count'];
            $dates[] = $voiture['dateVoitures'];
        }

        return $this->render('pages/index.html.twig', [
            'voitures' => $voitures,
            'voituresMarque' => json_encode($voituresMarque),
            'voituresColor' => json_encode($voituresColor),
            'voituresCount' => json_encode($voituresCount),
            'dates' => json_encode($dates),

        ]);
    }
}

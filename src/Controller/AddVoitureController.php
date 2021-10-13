<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Entity\Voiture;
use App\Form\AddVoitureType;
use App\Repository\VoitureRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use MongoDB\BSON\Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function MongoDB\BSON\toJSON;

class AddVoitureController extends AbstractController
{
    /**
     * @Route("/add/voiture", name="add_voiture")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, VoitureRepository $voitureRepository): Response
    {
        $voitures = $voitureRepository->findAll();
        $count = count($voitures);

        $form = $this->createForm(AddVoitureType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('file_name')->getData();

            if ($file) {
                $newFilename = 'import_voiture_' . uniqid() . '.csv';
                try {
                    $file->move(
                        $this->getParameter('voitures_directory'),
                        $newFilename
                    );
                    if (($handle = fopen($this->getParameter('voitures_directory') . '/' . $newFilename, "r")) !== FALSE) {
                        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                            if (count($data) == 6) {
                                $marque = $entityManager->getRepository('App:Marque')->findOneBy(['id'=>$data[2]]);

                                $energie = $entityManager->getRepository('App:Energie')->findOneBy(['id'=>$data[5]]);

                                $date = new DateTime();

                                $date->format('Y-m-d');

                                $voiture = new Voiture();
                                $voiture->setNumArrivage($data[0]);
                                $voiture->setFournisseur($data[1]);
                                $marque->addVoiture($voiture);
                                $voiture->setModele($data[3]);
                                $voiture->setDateDispo($date);
                                $energie->addVoiture($voiture);

                                $entityManager->persist($voiture);
                            }
                            try {
                                $entityManager->flush();


                            } catch (FileException $e) {
                                throw new FileException('Problème de nombre de colonnes dans le fichier (5 colonnes requises)');
                            }
                        }
                    }
                } catch (FileException $e) {
                    throw new FileException('Problème d\'ouverture du fichier');
                }
                $this->addFlash('success', 'Voiture(s) ajoutée(s) avec succès (' . $count . ')');
            } return $this->redirectToRoute('add_voiture');
        }

        return $this->render('add_voiture/addVoiture.html.twig', [
            'addVoitureForm' => $form->createView(),
            'count' => $count,
        ]);
    }
}

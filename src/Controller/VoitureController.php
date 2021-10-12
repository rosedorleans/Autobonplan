<?php

namespace App\Controller;

use App\Entity\Voiture;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\YamlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class VoitureController extends AbstractController
{
    /**
     * @Route("/voiture", name="voiture")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {

        // Your Controller.php
        $form = $this->createFormBuilder()
            ->add('submitFile', FileType::class, array('label' => 'File to Submit', 'mapped'=>false))
            ->getForm();

            $form->handleRequest($request);

            // If form is valid
            if ($request->query->get('submitFile')) {
                // Get file
                $file = $form->get('submitFile')->getData();
                $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
                $normalizers = [new ObjectNormalizer()];
                $encoders = [
                    new CsvEncoder(),
                    new XmlEncoder(),
                    new YamlEncoder()
                ];
                $serializer = new Serializer($normalizers, $encoders);

                /** @var string $fileString */
                $fileString = file_get_contents($file);

                $data = $serializer->decode($fileString, $fileExtension);

                // Your csv file here when you hit submit button

                foreach ($data as $row) {
                    $marque = $entityManager->getRepository('App:Marque')->findOneBy(['nom'=> $row['marque_id']]);
                    $energie = $entityManager->getRepository('App:Energie')->findOneBy(['nom'=> $row['energie_id']]);

                    $voiture = new Voiture();
                    $voiture->setNumArrivage($row['num_arrivage']);
                    $voiture->setFournisseur($row['fournisseur']);
                    $marque->addVoiture($voiture);
                    $voiture->setModele($row['modele']);
                    $voiture->setDateDispo($row['date_dispo']);
                    $energie->addVoiture($voiture);

                    $entityManager->persist($voiture);
                    $entityManager->persist($energie);
                    $entityManager->persist($marque);
                    $entityManager->flush();
                }
                return $this->redirectToRoute('index');
            }
        return $this->render('voiture/index.html.twig', ['form' => $form->createView()]);

    }

    private function lireFichierCsv($file){
        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
        $normalizers = [new ObjectNormalizer()];
        $encoders = [
            new CsvEncoder(),
            new XmlEncoder(),
            new YamlEncoder()
        ];
        $serializer = new Serializer($normalizers, $encoders);

        /** @var string $fileString */
        $fileString = file_get_contents($file);

        $data = $serializer->decode($fileString, $fileExtension);

        // Your csv file here when you hit submit button

        foreach ($data as $row) {
            /** @var EntityManagerInterface $entityManager */
            $marque = $entityManager->getRepository('App:Marque')->findOneBy(['nom'=> $row['marque_id']]);
            $energie = $entityManager->getRepository('App:Energie')->findOneBy(['nom'=> $row['energie_id']]);

            $voiture = new Voiture();
            $voiture->setNumArrivage($row['num_arrivage']);
            $voiture->setFournisseur($row['fournisseur']);
            $marque->addVoiture($voiture);
            $voiture->setModele($row['modele']);
            $voiture->setDateDispo($row['date_dispo']);
            $energie->addVoiture($voiture);

            $entityManager->persist($voiture);
            $entityManager->persist($energie);
            $entityManager->persist($marque);
            $entityManager->flush();
        }
        return $this->redirectToRoute('index');
    }
}

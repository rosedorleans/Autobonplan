<?php

namespace App\Command;

use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\YamlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ImportFileCSVCommand extends Command
{
    private $entityManager;
    private $dataDirectory;
    private $io;
    private $voitureRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        string $dataDirectory,
        VoitureRepository $voitureRepository
    )
    {
        parent::__construct();
        $this->dataDirectory = $dataDirectory;
        $this->entityManager = $entityManager;
        $this->voitureRepository = $voitureRepository;
    }

    protected static $defaultName = 'app:import-file-csv';

    protected function configure(): void
    {
        $this->setDescription('Importer des données en provenance d\'un fichier CSV');
    }

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->importFile();

        return 0;
    }

    private function getDataFromFile(): array {
        $file = $this->dataDirectory . 'arrivages-import1.csv';
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
        dd($data);
    }

    private function importFile() : void {
        $this->getDataFromFile();
    }

}

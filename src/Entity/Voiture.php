<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoitureRepository::class)
 */
class Voiture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fournisseur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $immatriculation;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDeMEC;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $VIN;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $version;

    /**
     * @ORM\Column(type="integer")
     */
    private $places;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $energie;

    /**
     * @ORM\Column(type="integer")
     */
    private $puissanceFiscale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $carrosserie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $segment;

    /**
     * @ORM\Column(type="integer")
     */
    private $portes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $kms;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleurInterieure;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sellerie;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateAchat;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateEntreeParc;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateHeureVente;

    /**
     * @ORM\Column(type="integer")
     */
    private $puissanceDIN;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $boiteDeVitesse;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreDeRapports;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixAchat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $achatTVA;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prixParticulierTTC;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $venteVehiculeTVA;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prixProfessionnelTTC;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeDeGarantie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codeRadio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $frais;

    /**
     * @ORM\Column(type="integer")
     */
    private $fraisReelHT;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $equipementDeSerie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $equipementEnOption;

    /**
     * @ORM\Column(type="integer")
     */
    private $cylindree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $provenance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $consoCO2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numeroLotAchat;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $poidsVideMin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dureeEnMois;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeCNIT;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEntreeArrivage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parc;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $livraisonPrevueBC;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $livraisonPrevueBT;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDispo;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $Etat): self
    {
        $this->Etat = $Etat;

        return $this;
    }

    public function getFournisseur(): ?string
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?string $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(?string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getDateDeMEC(): ?\DateTimeInterface
    {
        return $this->dateDeMEC;
    }

    public function setDateDeMEC(?\DateTimeInterface $dateDeMEC): self
    {
        $this->dateDeMEC = $dateDeMEC;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(?string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getVIN(): ?string
    {
        return $this->VIN;
    }

    public function setVIN(string $VIN): self
    {
        $this->VIN = $VIN;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->places;
    }

    public function setPlaces(int $places): self
    {
        $this->places = $places;

        return $this;
    }

    public function getEnergie(): ?string
    {
        return $this->energie;
    }

    public function setEnergie(string $energie): self
    {
        $this->energie = $energie;

        return $this;
    }

    public function getPuissanceFiscale(): ?int
    {
        return $this->puissanceFiscale;
    }

    public function setPuissanceFiscale(int $puissanceFiscale): self
    {
        $this->puissanceFiscale = $puissanceFiscale;

        return $this;
    }

    public function getCarrosserie(): ?string
    {
        return $this->carrosserie;
    }

    public function setCarrosserie(string $carrosserie): self
    {
        $this->carrosserie = $carrosserie;

        return $this;
    }

    public function getSegment(): ?string
    {
        return $this->segment;
    }

    public function setSegment(?string $segment): self
    {
        $this->segment = $segment;

        return $this;
    }

    public function getPortes(): ?int
    {
        return $this->portes;
    }

    public function setPortes(int $portes): self
    {
        $this->portes = $portes;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getKms(): ?int
    {
        return $this->kms;
    }

    public function setKms(?int $kms): self
    {
        $this->kms = $kms;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getCouleurInterieure(): ?string
    {
        return $this->couleurInterieure;
    }

    public function setCouleurInterieure(?string $couleurInterieure): self
    {
        $this->couleurInterieure = $couleurInterieure;

        return $this;
    }

    public function getSellerie(): ?string
    {
        return $this->sellerie;
    }

    public function setSellerie(?string $sellerie): self
    {
        $this->sellerie = $sellerie;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(?\DateTimeInterface $dateAchat): self
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function getDateEntreeParc(): ?\DateTimeInterface
    {
        return $this->dateEntreeParc;
    }

    public function setDateEntreeParc(?\DateTimeInterface $dateEntreeParc): self
    {
        $this->dateEntreeParc = $dateEntreeParc;

        return $this;
    }

    public function getDateHeureVente(): ?\DateTimeInterface
    {
        return $this->dateHeureVente;
    }

    public function setDateHeureVente(?\DateTimeInterface $dateHeureVente): self
    {
        $this->dateHeureVente = $dateHeureVente;

        return $this;
    }

    public function getPuissanceDIN(): ?int
    {
        return $this->puissanceDIN;
    }

    public function setPuissanceDIN(int $puissanceDIN): self
    {
        $this->puissanceDIN = $puissanceDIN;

        return $this;
    }

    public function getBoiteDeVitesse(): ?string
    {
        return $this->boiteDeVitesse;
    }

    public function setBoiteDeVitesse(string $boiteDeVitesse): self
    {
        $this->boiteDeVitesse = $boiteDeVitesse;

        return $this;
    }

    public function getNombreDeRapports(): ?int
    {
        return $this->nombreDeRapports;
    }

    public function setNombreDeRapports(int $nombreDeRapports): self
    {
        $this->nombreDeRapports = $nombreDeRapports;

        return $this;
    }

    public function getPrixAchat(): ?float
    {
        return $this->prixAchat;
    }

    public function setPrixAchat(?float $prixAchat): self
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    public function getAchatTVA(): ?string
    {
        return $this->achatTVA;
    }

    public function setAchatTVA(?string $achatTVA): self
    {
        $this->achatTVA = $achatTVA;

        return $this;
    }

    public function getPrixParticulierTTC(): ?int
    {
        return $this->prixParticulierTTC;
    }

    public function setPrixParticulierTTC(?int $prixParticulierTTC): self
    {
        $this->prixParticulierTTC = $prixParticulierTTC;

        return $this;
    }

    public function getVenteVehiculeTVA(): ?string
    {
        return $this->venteVehiculeTVA;
    }

    public function setVenteVehiculeTVA(?string $venteVehiculeTVA): self
    {
        $this->venteVehiculeTVA = $venteVehiculeTVA;

        return $this;
    }

    public function getPrixProfessionnelTTC(): ?int
    {
        return $this->prixProfessionnelTTC;
    }

    public function setPrixProfessionnelTTC(?int $prixProfessionnelTTC): self
    {
        $this->prixProfessionnelTTC = $prixProfessionnelTTC;

        return $this;
    }

    public function getTypeDeGarantie(): ?string
    {
        return $this->typeDeGarantie;
    }

    public function setTypeDeGarantie(?string $typeDeGarantie): self
    {
        $this->typeDeGarantie = $typeDeGarantie;

        return $this;
    }

    public function getCodeRadio(): ?int
    {
        return $this->codeRadio;
    }

    public function setCodeRadio(?int $codeRadio): self
    {
        $this->codeRadio = $codeRadio;

        return $this;
    }

    public function getFrais(): ?string
    {
        return $this->frais;
    }

    public function setFrais(?string $frais): self
    {
        $this->frais = $frais;

        return $this;
    }

    public function getFraisReelHT(): ?int
    {
        return $this->fraisReelHT;
    }

    public function setFraisReelHT(int $fraisReelHT): self
    {
        $this->fraisReelHT = $fraisReelHT;

        return $this;
    }

    public function getEquipementDeSerie(): ?string
    {
        return $this->equipementDeSerie;
    }

    public function setEquipementDeSerie(?string $equipementDeSerie): self
    {
        $this->equipementDeSerie = $equipementDeSerie;

        return $this;
    }

    public function getEquipementEnOption(): ?string
    {
        return $this->equipementEnOption;
    }

    public function setEquipementEnOption(?string $equipementEnOption): self
    {
        $this->equipementEnOption = $equipementEnOption;

        return $this;
    }

    public function getCylindree(): ?int
    {
        return $this->cylindree;
    }

    public function setCylindree(int $cylindree): self
    {
        $this->cylindree = $cylindree;

        return $this;
    }

    public function getProvenance(): ?string
    {
        return $this->provenance;
    }

    public function setProvenance(string $provenance): self
    {
        $this->provenance = $provenance;

        return $this;
    }

    public function getConsoCO2(): ?int
    {
        return $this->consoCO2;
    }

    public function setConsoCO2(?int $consoCO2): self
    {
        $this->consoCO2 = $consoCO2;

        return $this;
    }

    public function getNumeroLotAchat(): ?int
    {
        return $this->numeroLotAchat;
    }

    public function setNumeroLotAchat(?int $numeroLotAchat): self
    {
        $this->numeroLotAchat = $numeroLotAchat;

        return $this;
    }

    public function getPoidsVideMin(): ?int
    {
        return $this->poidsVideMin;
    }

    public function setPoidsVideMin(?int $poidsVideMin): self
    {
        $this->poidsVideMin = $poidsVideMin;

        return $this;
    }

    public function getDureeEnMois(): ?int
    {
        return $this->dureeEnMois;
    }

    public function setDureeEnMois(?int $dureeEnMois): self
    {
        $this->dureeEnMois = $dureeEnMois;

        return $this;
    }

    public function getTypeCNIT(): ?string
    {
        return $this->typeCNIT;
    }

    public function setTypeCNIT(?string $typeCNIT): self
    {
        $this->typeCNIT = $typeCNIT;

        return $this;
    }

    public function getDateEntreeArrivage(): ?\DateTimeInterface
    {
        return $this->dateEntreeArrivage;
    }

    public function setDateEntreeArrivage(\DateTimeInterface $dateEntreeArrivage): self
    {
        $this->dateEntreeArrivage = $dateEntreeArrivage;

        return $this;
    }

    public function getParc(): ?string
    {
        return $this->parc;
    }

    public function setParc(?string $parc): self
    {
        $this->parc = $parc;

        return $this;
    }

    public function getLivraisonPrevueBC(): ?\DateTimeInterface
    {
        return $this->livraisonPrevueBC;
    }

    public function setLivraisonPrevueBC(?\DateTimeInterface $livraisonPrevueBC): self
    {
        $this->livraisonPrevueBC = $livraisonPrevueBC;

        return $this;
    }

    public function getLivraisonPrevueBT(): ?\DateTimeInterface
    {
        return $this->livraisonPrevueBT;
    }

    public function setLivraisonPrevueBT(?\DateTimeInterface $livraisonPrevueBT): self
    {
        $this->livraisonPrevueBT = $livraisonPrevueBT;

        return $this;
    }

    public function getDateDispo(): ?\DateTimeInterface
    {
        return $this->dateDispo;
    }

    public function setDateDispo(\DateTimeInterface $dateDispo): self
    {
        $this->dateDispo = $dateDispo;

        return $this;
    }
}

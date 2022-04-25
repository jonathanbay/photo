<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: AccueilMariage::class)]
    private $accueilMariages;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: AccueilFamille::class)]
    private $accueilFamilles;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: AccueilEvenement::class)]
    private $accueilEvenements;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: AccueilEnfant::class)]
    private $accueilEnfants;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: AccueilAnimaux::class)]
    private $accueilAnimauxes;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Mariage::class)]
    private $mariages;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Enfant::class)]
    private $enfants;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Animaux::class)]
    private $animauxes;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Evenement::class)]
    private $evenements;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Famille::class)]
    private $familles;

    public function __construct()
    {
        $this->accueilMariages = new ArrayCollection();
        $this->accueilFamilles = new ArrayCollection();
        $this->accueilEvenements = new ArrayCollection();
        $this->accueilEnfants = new ArrayCollection();
        $this->accueilAnimauxes = new ArrayCollection();
        $this->mariages = new ArrayCollection();
        $this->enfants = new ArrayCollection();
        $this->animauxes = new ArrayCollection();
        $this->evenements = new ArrayCollection();
        $this->familles = new ArrayCollection();
    }
    public function __tostring() {
        return $this->getNom();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, AccueilMariage>
     */
    public function getAccueilMariages(): Collection
    {
        return $this->accueilMariages;
    }

    public function addAccueilMariage(AccueilMariage $accueilMariage): self
    {
        if (!$this->accueilMariages->contains($accueilMariage)) {
            $this->accueilMariages[] = $accueilMariage;
            $accueilMariage->setCategorie($this);
        }

        return $this;
    }

    public function removeAccueilMariage(AccueilMariage $accueilMariage): self
    {
        if ($this->accueilMariages->removeElement($accueilMariage)) {
            // set the owning side to null (unless already changed)
            if ($accueilMariage->getCategorie() === $this) {
                $accueilMariage->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AccueilFamille>
     */
    public function getAccueilFamilles(): Collection
    {
        return $this->accueilFamilles;
    }

    public function addAccueilFamille(AccueilFamille $accueilFamille): self
    {
        if (!$this->accueilFamilles->contains($accueilFamille)) {
            $this->accueilFamilles[] = $accueilFamille;
            $accueilFamille->setCategorie($this);
        }

        return $this;
    }

    public function removeAccueilFamille(AccueilFamille $accueilFamille): self
    {
        if ($this->accueilFamilles->removeElement($accueilFamille)) {
            // set the owning side to null (unless already changed)
            if ($accueilFamille->getCategorie() === $this) {
                $accueilFamille->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AccueilEvenement>
     */
    public function getAccueilEvenements(): Collection
    {
        return $this->accueilEvenements;
    }

    public function addAccueilEvenement(AccueilEvenement $accueilEvenement): self
    {
        if (!$this->accueilEvenements->contains($accueilEvenement)) {
            $this->accueilEvenements[] = $accueilEvenement;
            $accueilEvenement->setCategorie($this);
        }

        return $this;
    }

    public function removeAccueilEvenement(AccueilEvenement $accueilEvenement): self
    {
        if ($this->accueilEvenements->removeElement($accueilEvenement)) {
            // set the owning side to null (unless already changed)
            if ($accueilEvenement->getCategorie() === $this) {
                $accueilEvenement->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AccueilEnfant>
     */
    public function getAccueilEnfants(): Collection
    {
        return $this->accueilEnfants;
    }

    public function addAccueilEnfant(AccueilEnfant $accueilEnfant): self
    {
        if (!$this->accueilEnfants->contains($accueilEnfant)) {
            $this->accueilEnfants[] = $accueilEnfant;
            $accueilEnfant->setCategorie($this);
        }

        return $this;
    }

    public function removeAccueilEnfant(AccueilEnfant $accueilEnfant): self
    {
        if ($this->accueilEnfants->removeElement($accueilEnfant)) {
            // set the owning side to null (unless already changed)
            if ($accueilEnfant->getCategorie() === $this) {
                $accueilEnfant->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AccueilAnimaux>
     */
    public function getAccueilAnimauxes(): Collection
    {
        return $this->accueilAnimauxes;
    }

    public function addAccueilAnimaux(AccueilAnimaux $accueilAnimaux): self
    {
        if (!$this->accueilAnimauxes->contains($accueilAnimaux)) {
            $this->accueilAnimauxes[] = $accueilAnimaux;
            $accueilAnimaux->setCategorie($this);
        }

        return $this;
    }

    public function removeAccueilAnimaux(AccueilAnimaux $accueilAnimaux): self
    {
        if ($this->accueilAnimauxes->removeElement($accueilAnimaux)) {
            // set the owning side to null (unless already changed)
            if ($accueilAnimaux->getCategorie() === $this) {
                $accueilAnimaux->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Mariage>
     */
    public function getMariages(): Collection
    {
        return $this->mariages;
    }

    public function addMariage(Mariage $mariage): self
    {
        if (!$this->mariages->contains($mariage)) {
            $this->mariages[] = $mariage;
            $mariage->setCategorie($this);
        }

        return $this;
    }

    public function removeMariage(Mariage $mariage): self
    {
        if ($this->mariages->removeElement($mariage)) {
            // set the owning side to null (unless already changed)
            if ($mariage->getCategorie() === $this) {
                $mariage->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Enfant>
     */
    public function getEnfants(): Collection
    {
        return $this->enfants;
    }

    public function addEnfant(Enfant $enfant): self
    {
        if (!$this->enfants->contains($enfant)) {
            $this->enfants[] = $enfant;
            $enfant->setCategorie($this);
        }

        return $this;
    }

    public function removeEnfant(Enfant $enfant): self
    {
        if ($this->enfants->removeElement($enfant)) {
            // set the owning side to null (unless already changed)
            if ($enfant->getCategorie() === $this) {
                $enfant->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Animaux>
     */
    public function getAnimauxes(): Collection
    {
        return $this->animauxes;
    }

    public function addAnimaux(Animaux $animaux): self
    {
        if (!$this->animauxes->contains($animaux)) {
            $this->animauxes[] = $animaux;
            $animaux->setCategorie($this);
        }

        return $this;
    }

    public function removeAnimaux(Animaux $animaux): self
    {
        if ($this->animauxes->removeElement($animaux)) {
            // set the owning side to null (unless already changed)
            if ($animaux->getCategorie() === $this) {
                $animaux->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Evenement>
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): self
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements[] = $evenement;
            $evenement->setCategorie($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->evenements->removeElement($evenement)) {
            // set the owning side to null (unless already changed)
            if ($evenement->getCategorie() === $this) {
                $evenement->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Famille>
     */
    public function getFamilles(): Collection
    {
        return $this->familles;
    }

    public function addFamille(Famille $famille): self
    {
        if (!$this->familles->contains($famille)) {
            $this->familles[] = $famille;
            $famille->setCategorie($this);
        }

        return $this;
    }

    public function removeFamille(Famille $famille): self
    {
        if ($this->familles->removeElement($famille)) {
            // set the owning side to null (unless already changed)
            if ($famille->getCategorie() === $this) {
                $famille->setCategorie(null);
            }
        }

        return $this;
    }
}

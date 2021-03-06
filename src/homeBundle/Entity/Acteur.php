<?php

namespace homeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Acteur
 *
 * @ORM\Table(name="acteur")
 * @ORM\Entity(repositoryClass="homeBundle\Repository\ActeurRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Acteur
{
    public function __construct()
    {
        $this->films = new ArrayCollection();
    }


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_timestamp", type="datetime")
     */
    private $creationTimestamp;
    

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date")
     */
    private $dateNaissance;


    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", length=50)
     */
    private $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="biographie", type="text", nullable=true)
     */
    private $bio;


    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;


    /**
     * @ORM\ManyToMany(targetEntity="Film", inversedBy="acteurs")
     * @ORM\JoinTable(name="acteur_film",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_acteur", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_film", referencedColumnName="id")
     *   }
     * )
     */
    protected $films;

    /**
     * Attribut "virtuel" qui représentera mon fichier uploadé.
     *
     * @Assert\Image(
     *     minWidth = 100,
     *     maxWidth = 3000,
     *     minHeight = 100,
     *     maxHeight = 2500,
     *     maxWidthMessage= "La largeur est trop grande",
     *     minWidthMessage = "La largeur est trop petite",
     *     maxHeightMessage = "La hauteur est trop grande",
     *     minHeightMessage = "La largeur est trop petite",
     *     groups={"new", "edit"}
     * )
     */
    protected $file;


    public function webPath()
    {
        return "dist/img/uploads/profils/".$this->image;
    }


    /* UPLOAD DE LA PHOTO DE PROFIL */



    public $name;
    public $path;

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        $this->oldAfficheName = $this->image;
        $this->image = "lancement lifecycle de la méthode upload pour l'update";
    }

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    public function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    public function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'dist/img/uploads/profils/';
    }


    // lifecycle pour la suppression du fichier de la photo à la suppression de l'acteur dans la base
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function upload()
    {
        // la propriété « file » peut être vide si le champ n'est pas requis
        if (null === $this->file) {
            return;
        }

        // utilisez le nom de fichier original ici mais
        // vous devriez « l'assainir » pour au moins éviter
        // quelconques problèmes de sécurité

        // Déplacer le fichier uploadé dans le bon répertoir
        // uploads/affiches/
        $filename = uniqid(null, true)."-".$this->getNom().".".$this->file->guessClientExtension();
        $this->image = $filename;

        // je stocke le nom du fichier uploadé dans mon
        //attribut affiche
        $this->file->move($this->getUploadRootDir(), $this->image);

        // « nettoie » la propriété « file » comme vous n'en aurez plus besoin
        $this->file = null;
    }


    /**
     * @ORM\PostRemove()
     */
    public function delete()
    {

        if (file_exists($this->getUploadRootDir().$this->image)){

            unlink($this->getUploadRootDir().$this->image);

        }
    }



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Acteur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Acteur
     */
    public function setPrénom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrénom()
    {
        return $this->prenom;
    }


    /**
     * Set image
     *
     * @param string $image
     * @return Acteur
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Acteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Add films
     *
     * @param \homeBundle\Entity\Acteur $films
     * @return Acteur
     */
    public function addFilm(\homeBundle\Entity\Film $films)
    {
        $this->films[] = $films;

        return $this;
    }

    /**
     * Remove films
     *
     * @param \homeBundle\Entity\Acteur $films
     */
    public function removeFilm(\homeBundle\Entity\Film $films)
    {
        $this->films->removeElement($films);
    }

    /**
     * Get films
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFilms()
    {
        return $this->films;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return Acteur
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set nationalite
     *
     * @param string $nationalite
     * @return Acteur
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * Get nationalite
     *
     * @return string 
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * Set bio
     *
     * @param string $bio
     * @return Acteur
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get bio
     *
     * @return string 
     */
    public function getBio()
    {
        return $this->bio;
    }


    // gestionnaire de référence circulaire
    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->nom . " " . $this->prenom;
    }

    /**
     * @ORM\PrePersist()
     */
    public function createCreationDate()
    {
        $this->creationTimestamp = new \DateTime();
    }

    /**
     * Set creationTimestamp
     *
     * @param \DateTime $creationTimestamp
     *
     * @return Acteur
     */
    public function setCreationTimestamp($creationTimestamp)
    {
        $this->creationTimestamp = $creationTimestamp;

        return $this;
    }

    /**
     * Get creationTimestamp
     *
     * @return \DateTime
     */
    public function getCreationTimestamp()
    {
        return $this->creationTimestamp;
    }
}

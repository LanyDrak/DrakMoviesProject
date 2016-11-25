<?php

namespace homeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Film
 *
 * @ORM\Table(name="film")
 * @ORM\Entity(repositoryClass="homeBundle\Repository\FilmRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Film
{
    // creation des thumbnails
    private $thumbnails = [
        "xs" => [40, 40],
        "sm" => [150, 150],
        "md" => [400, 400],
        "lg" => [900, 900]
    ];


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_timestamp", type="datetime")
     */
    private $creationTimestamp;

    /**
     * @var string
     *
     * @ORM\Column(name="affiche", type="string", length=255, nullable=true)
     */
    private $affiche;

    /**
     * @var string
     *
     * @ORM\Column(name="frontThumbnail", type="string", length=255, nullable=true)
     */
    private $frontThumbnail;

    /**
     * @var string
     *
     * @ORM\Column(name="reviewN6tyrell", type="text", nullable=true)
     */
    private $reviewN6tyrell;

    /**
     * @var string
     *
     * @ORM\Column(name="reviewN6marzoni", type="text", nullable=true)
     */
    private $reviewN6marzoni;

    /**
     * @var string
     *
     * @ORM\Column(name="reviewN6palm", type="text", nullable=true)
     */
    private $reviewN6palm;

    /**
     * @var string
     *
     * @ORM\Column(name="reviewN6nikita", type="text", nullable=true)
     */
    private $reviewN6nikita;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="trailer", type="string", length=255)
     */
    private $trailer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSortie", type="datetime")
     */
    private $dateSortie;

    /**
     * @var int
     *
     * @ORM\Column(name="numVisa", type="bigint", unique=true, nullable=true)
     */
    private $numVisa;

    /**
     * @var string
     *
     * @ORM\Column(name="duree", type="decimal", precision=10, scale=0)
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="boxOfficeFrance", type="bigint", nullable=true)
     */
    private $boxOfficeFrance;

    /**
     * @var string
     *
     * @ORM\Column(name="budget", type="bigint")
     */
    private $budget;

    

    /**
     * @var string
     *
     * @ORM\Column(name="synopsis", type="text")
     */
    private $synopsis;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=20)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="director", type="string", length=50)
     */
    private $director;

    /**
     * @var int
     *
     * @ORM\Column(name="noteSpectateur", type="integer", nullable=true)
     */
    private $noteSpectateur;

    /**
     * @var int
     *
     * @ORM\Column(name="noteSpectateurRound", type="integer", nullable=true)
     */
    private $noteSpectateurRound;

    /**
     * @var int
     *
     * @ORM\Column(name="noteN6Tyrell", type="integer", nullable=true)
     */
    private $noteN6Tyrell;

    /**
     * @var int
     *
     * @ORM\Column(name="noteN6Marzoni", type="integer", nullable=true)
     */
    private $noteN6Marzoni;

    /**
     * @var int
     *
     * @ORM\Column(name="noteN6Palm", type="integer", nullable=true)
     */
    private $noteN6Palm;

    /**
     * @var int
     *
     * @ORM\Column(name="noteN6Nikita", type="integer", nullable=true)
     */
    private $noteN6Nikita;

    /**
     * @var int
     *
     * @ORM\Column(name="censure", type="integer", nullable=true)
     */
    private $censure;

    /**
     * @var bool
     *
     * @ORM\Column(name="aLaffiche", type="boolean", nullable=true)
     */
    private $aLaffiche;


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


    /**
     * @ORM\ManyToOne(targetEntity="Genre")
     * @ORM\JoinColumn(name="genre_id", referencedColumnName="id")
     */
    private $genre;



    /**
     * @ORM\ManyToMany(targetEntity="Acteur", mappedBy="films")
     */
    private $acteurs;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_updated", type="datetime")
     */
    private $dateUpdated;



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
     * Set affiche
     *
     * @param string $affiche
     * @return Film
     */
    public function setAffiche($affiche)
    {
        $this->affiche = $affiche;

        return $this;
    }

    /**
     * Get affiche
     *
     * @return string 
     */
    public function getAffiche()
    {
        return $this->affiche;
    }

    public function webPath($thumbnail = null)
    {
        $output = "dist/img/uploads/affiches/".$this->affiche;

        if (array_key_exists($thumbnail, $this->thumbnails)) {
            $output = "dist/img/uploads/affiches/".$thumbnail."-".$this->affiche;
        }

        return $output;
    }

    public function webPath2($thumbnail = null)
    {
        $output = "dist/img/images-test/thumbs/null.jpg";

        if ($this->frontThumbnail != null){
            $output = "dist/img/uploads/frontThumbnails/".$this->frontThumbnail;
        }

        if (array_key_exists($thumbnail, $this->thumbnails)) {
            $output = "dist/img/uploads/frontThumbnails/".$thumbnail."-".$this->frontThumbnail;
        }

        return $output;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Film
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
     * Set dateSortie
     *
     * @param \DateTime $dateSortie
     * @return Film
     */
    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    /**
     * Get dateSortie
     *
     * @return \DateTime 
     */
    public function getDateSortie()
    {
        return $this->dateSortie;
    }

    /**
     * Set numVisa
     *
     * @param integer $numVisa
     * @return Film
     */
    public function setNumVisa($numVisa)
    {
        $this->numVisa = $numVisa;

        return $this;
    }

    /**
     * Get numVisa
     *
     * @return integer 
     */
    public function getNumVisa()
    {
        return $this->numVisa;
    }

    /**
     * Set duree
     *
     * @param string $duree
     * @return Film
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return string 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Film
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set noteSpectateur
     *
     * @param integer $noteSpectateur
     * @return Film
     */
    public function setNoteSpectateur($noteSpectateur)
    {
        $this->noteSpectateur = $noteSpectateur;

        return $this;
    }

    /**
     * Get noteSpectateur
     *
     * @return integer 
     */
    public function getNoteSpectateur()
    {
        $numberOfN6 = [ $this->getNoteN6Tyrell(),
                        $this->getNoteN6Marzoni(),
                        $this->getNoteN6Palm()
                        ];

        $counterNull = 0;

        foreach ($numberOfN6 as $n6)
        {
            if($n6 == null){
                $counterNull++;
            }
        }

        $numberOfN6on = count($numberOfN6) - $counterNull;

        if ($numberOfN6on == 0){

            $this->noteSpectateur = 0;

        } else{

            $this->noteSpectateur = (
                                    ($this->getNoteN6Tyrell()) +
                                    ($this->getNoteN6Marzoni()) +
                                    ($this->getNoteN6Palm())
                                    ) /$numberOfN6on;
        }

        return $this->noteSpectateur;
    }

    /**
     * Set noteSpectateurRound
     *
     * @param integer $noteSpectateurRound
     *
     * @return Film
     */
    public function setNoteSpectateurRound($noteSpectateurRound)
    {
        $this->noteSpectateurRound = $noteSpectateurRound;

        return $this;
    }

    /**
     * Get noteSpectateurRound
     *
     * @return integer
     */
    public function getNoteSpectateurRound()
    {
        return round($this->noteSpectateur);
    }

    /**
     * Set censure
     *
     * @param integer $censure
     * @return Film
     */
    public function setCensure($censure)
    {
        $this->censure = $censure;

        return $this;
    }

    /**
     * Get censure
     *
     * @return integer 
     */
    public function getCensure()
    {
        return $this->censure;
    }

    /**
     * Set aLaffiche
     *
     * @param boolean $aLaffiche
     * @return Film
     */
    public function setALaffiche($aLaffiche)
    {
        $this->aLaffiche = $aLaffiche;

        return $this;
    }

    /**
     * Get aLaffiche
     *
     * @return boolean 
     */
    public function getALaffiche()
    {
        return $this->aLaffiche;
    }



    public $oldAfficheName;


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
        $this->oldAfficheName = $this->affiche;
        /*$this->affiche = "lancement lifecycle de la méthode upload pour l'update";*/
    }

    public function getAbsolutePath()
    {
        return null === $this->affiche
            ? null
            : $this->getUploadRootDir().'/'.$this->affiche;
    }

    public function getWebPath()
    {
        $output = null;

        // Tester si le thumbnail existe

        if ($this->affiche){
            $output = $this->getUploadDir().$this->affiche;
        }

        return $output;
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
        return 'dist/img/uploads/affiches/';
    }





    // lifecycle pour la suppression du fichier de l'affiche à la suppression du film dans la base
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function upload()
    {
        // la propriété « file » peut être vide si le champ n'est pas requis
        if (null === $this->file){
            return;
        }
        

        if ($this->oldAfficheName != null)
        {
            foreach($this->thumbnails as $key => $thumbsize)
            {
                unlink($this->getUploadRootDir().$key."-".$this->oldAfficheName);
            }
            unlink($this->getUploadRootDir().$this->oldAfficheName);
        }

        // utilisez le nom de fichier original ici mais
        // vous devriez « l'assainir » pour au moins éviter
        // quelconques problèmes de sécurité

        // je stocke le nom du fichier uploadé dans mon
        //attribut affiche
        // avant je faisais ça : $this->affiche = uniqid(null, true).$this->file->getClientOriginalName();

        $filename = uniqid(null, true)."-".$this->getNom().".".$this->file->guessClientExtension();
        $this->affiche = $filename;

        // Déplacer le fichier uploadé dans le bon répertoire
        // uploads/affiches/
        $this->file->move($this->getUploadRootDir(), $this->affiche);


        // « nettoie » la propriété « file » comme vous n'en aurez plus besoin
        $this->file = null;

        // creation des thumbnails


        $imagine    = new \Imagine\Gd\Imagine();

        $mode       = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;

        $imagineOpen = $imagine->open($this->getAbsolutePath());

        foreach($this->thumbnails as $key => $thumbsize)
        {
            $size       = new \Imagine\Image\Box($thumbsize[0], $thumbsize[1]);

            $imagineOpen->thumbnail($size, $mode)
                        ->save($this->getUploadRootDir().$key."-".$filename);
        }

    }

    /**
     * @ORM\PostRemove()
     */
    public function delete()
    {
        if (file_exists($this->getUploadRootDir().$this->affiche)){

            foreach($this->thumbnails as $key => $thumbsize)
            {
                unlink($this->getUploadRootDir().$key."-".$this->affiche);
            }

            unlink($this->getUploadRootDir().$this->affiche);

        }
    }



    /**
     * @return string
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * @param string $synopsis
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;
    }


    /**
     * Set director
     *
     * @param string $director
     * @return Film
     */
    public function setDirector($director)
    {
        $this->director = $director;

        return $this;
    }

    /**
     * Get director
     *
     * @return string 
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set boxOfficeFrance
     *
     * @param integer $boxOfficeFrance
     * @return Film
     */
    public function setBoxOfficeFrance($boxOfficeFrance)
    {
        $this->boxOfficeFrance = $boxOfficeFrance;

        return $this;
    }

    /**
     * Get boxOfficeFrance
     *
     * @return integer 
     */
    public function getBoxOfficeFrance()
    {
        return $this->boxOfficeFrance;
    }

    /**
     * Set budget
     *
     * @param integer $budget
     * @return Film
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return integer 
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set trailer
     *
     * @param string $trailer
     * @return Film
     */
    public function setTrailer($trailer)
    {
        $this->trailer = $trailer;

        return $this;
    }

    /**
     * Get trailer
     *
     * @return string 
     */
    public function getTrailer()
    {
        return $this->trailer;
    }


    /**
     * Set genre
     *
     * @param \homeBundle\Entity\Genre $genre
     * @return Film
     */
    public function setGenre(\homeBundle\Entity\Genre $genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return \homeBundle\Entity\Genre 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->acteurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add acteurs
     *
     * @param \homeBundle\Entity\Acteur $acteurs
     * @return Film
     */
    public function addActeur(\homeBundle\Entity\Acteur $acteurs)
    {
        $this->acteurs[] = $acteurs;
        $acteurs->addFilm($this);

        return $this;
    }

    /**
     * Remove acteurs
     *
     * @param \homeBundle\Entity\Acteur $acteurs
     */
    public function removeActeur(\homeBundle\Entity\Acteur $acteurs)
    {
        $acteurs->removeFilm($this);
        $this->acteurs->removeElement($acteurs);
    }

    /**
     * Get acteurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActeurs()
    {
        return $this->acteurs;
    }


    // gestionnaire de référence circulaire
    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }



    /**
     * Set dateUpdated
     *
     * @param \DateTime $dateUpdated
     *
     * @return Film
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }

    /**
     * Get dateUpdated
     *
     * @return \DateTime
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }


    // lifecycle de la date de MAJ

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function UpdateDate()
    {
        $this->dateUpdated = new \DateTime();
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
     * @return Film
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

    /**
     * Set frontThumbnail
     *
     * @param string $frontThumbnail
     *
     * @return Film
     */
    public function setFrontThumbnail($frontThumbnail)
    {
        $this->frontThumbnail = $frontThumbnail;

        return $this;
    }

    /**
     * Get frontThumbnail
     *
     * @return string
     */
    public function getFrontThumbnail()
    {
        return $this->frontThumbnail;
    }

    /**
     * Set reviewN6tyrell
     *
     * @param string $reviewN6tyrell
     *
     * @return Film
     */
    public function setReviewN6tyrell($reviewN6tyrell)
    {
        $this->reviewN6tyrell = $reviewN6tyrell;

        return $this;
    }

    /**
     * Get reviewN6tyrell
     *
     * @return string
     */
    public function getReviewN6tyrell()
    {
        return $this->reviewN6tyrell;
    }

    /**
     * Set reviewN6marzoni
     *
     * @param string $reviewN6marzoni
     *
     * @return Film
     */
    public function setReviewN6marzoni($reviewN6marzoni)
    {
        $this->reviewN6marzoni = $reviewN6marzoni;

        return $this;
    }

    /**
     * Get reviewN6marzoni
     *
     * @return string
     */
    public function getReviewN6marzoni()
    {
        return $this->reviewN6marzoni;
    }

    /**
     * Set reviewN6palm
     *
     * @param string $reviewN6palm
     *
     * @return Film
     */
    public function setReviewN6palm($reviewN6palm)
    {
        $this->reviewN6palm = $reviewN6palm;

        return $this;
    }

    /**
     * Get reviewN6palm
     *
     * @return string
     */
    public function getReviewN6palm()
    {
        return $this->reviewN6palm;
    }

    /**
     * Set noteN6Tyrell
     *
     * @param integer $noteN6Tyrell
     *
     * @return Film
     */
    public function setNoteN6Tyrell($noteN6Tyrell)
    {
        $this->noteN6Tyrell = $noteN6Tyrell;

        return $this;
    }

    /**
     * Get noteN6Tyrell
     *
     * @return integer
     */
    public function getNoteN6Tyrell()
    {
        return $this->noteN6Tyrell;
    }

    /**
     * Set noteN6Marzoni
     *
     * @param integer $noteN6Marzoni
     *
     * @return Film
     */
    public function setNoteN6Marzoni($noteN6Marzoni)
    {
        $this->noteN6Marzoni = $noteN6Marzoni;

        return $this;
    }

    /**
     * Get noteN6Marzoni
     *
     * @return integer
     */
    public function getNoteN6Marzoni()
    {
        return $this->noteN6Marzoni;
    }

    /**
     * Set noteN6Palm
     *
     * @param integer $noteN6Palm
     *
     * @return Film
     */
    public function setNoteN6Palm($noteN6Palm)
    {
        $this->noteN6Palm = $noteN6Palm;

        return $this;
    }

    /**
     * Get noteN6Palm
     *
     * @return integer
     */
    public function getNoteN6Palm()
    {
        return $this->noteN6Palm;
    }

    /**
     * Set reviewN6nikita
     *
     * @param string $reviewN6nikita
     *
     * @return Film
     */
    public function setReviewN6nikita($reviewN6nikita)
    {
        $this->reviewN6nikita = $reviewN6nikita;

        return $this;
    }

    /**
     * Get reviewN6nikita
     *
     * @return string
     */
    public function getReviewN6nikita()
    {
        return $this->reviewN6nikita;
    }

    /**
     * Set noteN6Nikita
     *
     * @param integer $noteN6Nikita
     *
     * @return Film
     */
    public function setNoteN6Nikita($noteN6Nikita)
    {
        $this->noteN6Nikita = $noteN6Nikita;

        return $this;
    }

    /**
     * Get noteN6Nikita
     *
     * @return integer
     */
    public function getNoteN6Nikita()
    {
        return $this->noteN6Nikita;
    }
}

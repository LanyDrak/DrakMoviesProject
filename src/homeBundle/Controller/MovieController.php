<?php

namespace homeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use homeBundle\Entity\Film;

class MovieController extends Controller
{
    public function movieAction()
    {
        $movies = [
            [
                "id" => 1,
                "title" => "Mon premier film",
                "description" => "lorem ipsum",
                "date_created" => new \DateTime('now'),
                "length" => 10
            ],
            [
                "id" => 2,
                "title" => "Mon deuxième film",
                "description" => "lorem ipsum",
                "date_created" => new \DateTime('now'),
                "length" => 20
            ],
            [
                "id" => 3,
                "title" => "Mon troisième produit",
                "description" => "lorem ipsum",
                "date_created" => new \DateTime('now'),
                "length" => 30
            ],
            [
                "id" => 4,
                "title" => "",
                "description" => "lorem ipsum",
                "date_created" => new \DateTime('now'),
                "length" => 410
            ],
        ];
        return $this->render('homeBundle:Movie:index.html.twig', ['movies' => $movies]);
    }

    public function movieNameAction($movieName)
    {
        $firstName ='Lany';
        $lastName ='Drak';
        return $this->render('homeBundle:Movie:movie_name.html.twig', ['movieName' => $movieName, 'firstName'=>$firstName, 'lastName'=>$lastName]);
    }

    public function movieCreateAction()
    {
        $tableau_films = [
            // Film 1
            [
                'nom' 		=> 'Full Metal Jacket',
                'affiche'	=> 'ful_metal_jacket.jpg',
                'numVisa'	=> '5456115812141515',
                'duree'		=> '120',
                'note'		=> '10',
                'pays'		=> 'USA',
                'dateSortie'=> '1978-01-01',
	            'censure'	=> 'moins de 12 ans',
	            'alaffiche'	=> false
			],

	        // Film 2
	        [
                'nom' 		=> 'Full Metal Jacket 2 le retour',
                'affiche'	=> 'ful_metal_jacket2.jpg',
                'numVisa'	=> '5456115812145',
                'duree'		=> '120',
                'note'		=> '9',
                'pays'		=> 'USA',
                'dateSortie'=> '1978-01-01',
	            'censure'	=> 'moins de 16 ans',
	            'alaffiche'	=> false
			],
        ];

        $em = $this->getDoctrine()->getManager();
        $output = "";

        foreach ($tableau_films as $donnee_film)
        {
            $objetFilm = new Film();
            // Affectation des valeurs

            $objetFilm->setNom( $donnee_film['nom'] );
            $objetFilm->setAffiche( $donnee_film['affiche'] );
            $objetFilm->setNumVisa( $donnee_film['numVisa'] );
            $objetFilm->setDuree( $donnee_film['duree'] );
            $objetFilm->setNoteSpectateur( $donnee_film['note'] );
            $objetFilm->setPays( $donnee_film['pays'] );
            $objetFilm->setCensure( $donnee_film['censure'] );
            $objetFilm->setALaffiche( $donnee_film['alaffiche'] );
            // *** Setters correspondants au reste du tableau


            // *** Pour un champ de type date, datetime, on ferait ainsi:
            $dateSortie = new \DateTime($donnee_film['dateSortie']);
            $objetFilm->setDateSortie($dateSortie);


            // On demande la persistance de l'objet en base
            $em->persist($objetFilm);
            $em->flush();

            // Concaténation de la variable d'output
            $output .= "Film " . $objetFilm->getId() . ' créé ';			// \r\n indique un retour chariot
        }

        return new Response( 'Création des films OK ' . $output);
    }
}

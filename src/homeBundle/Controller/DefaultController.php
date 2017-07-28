<?php

namespace homeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $nbFilms = $em->getRepository("homeBundle:Film")        ->countFilms();
        $nbGenres = $em->getRepository("homeBundle:Genre")      ->countGenres();
        $nbActeurs = $em->getRepository("homeBundle:Acteur")    ->countActeurs();
        $last5Films = $em->getRepository("homeBundle:Film")     ->last5Films();
        $last5Acteurs = $em->getRepository("homeBundle:Acteur") ->last5Acteurs();
        $genres = $em->getRepository("homeBundle:Genre")        ->findAll();
        $films = $em->getRepository("homeBundle:Film")          ->findAll();
        $users = $em->getRepository("homeBundle:User")          ->findAll();
        $countUsers = $em->getRepository("homeBundle:User")     ->countUsers();
        $filmsByGenre = $em->getRepository("homeBundle:Film")   ->countFilmsByCategory();
        $counterReviewsLeftTyrell = $em->getRepository("homeBundle:Film")     ->countReviewsLeftTyrell();
        $counterReviewsLeftNikita = $em->getRepository("homeBundle:Film")     ->countReviewsLeftNikita();
        $counterReviewsLeftMarzoni = $em->getRepository("homeBundle:Film")     ->countReviewsLeftMarzoni();
        $counterReviewsLeftPalm = $em->getRepository("homeBundle:Film")     ->countReviewsLeftPalm();
        $counterReviewsLeftHitchman = $em->getRepository("homeBundle:Film")     ->countReviewsLeftHitchman();

        return $this->render('homeBundle:Default:index.html.twig',
           [
               'nbFilms' => ['nbFilms' => $nbFilms],
               'nbGenres' => ['nbGenres' => $nbGenres],
               'nbActeurs' => ['nbActeurs' => $nbActeurs],
               'last5Films'  => $last5Films,
               'last5Acteurs' => $last5Acteurs,
               'films' => $films,
               'genres' => $genres,
               'users'  => $users,
               'countUsers' => $countUsers,
               'filmsByGenre' => $filmsByGenre,
               'counterReviewsLeftTyrell' => $counterReviewsLeftTyrell,
               'counterReviewsLeftNikita' => $counterReviewsLeftNikita,
               'counterReviewsLeftMarzoni' => $counterReviewsLeftMarzoni,
               'counterReviewsLeftPalm' => $counterReviewsLeftPalm,
               'counterReviewsLeftHitchman' => $counterReviewsLeftHitchman
           ] );
    }
}

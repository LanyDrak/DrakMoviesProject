<?php

namespace frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository("homeBundle:Film")->allFilmsbyDatePublished();

        return $this->render('frontBundle:Default:index.html.twig', ['films' => $films]);
    }

    public function indexByGenreAction($genre)
    {
        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository("homeBundle:Film")->findBy(
            array('genre' => $genre),
            array('creationTimestamp' => 'DESC'));

        return $this->render('frontBundle:Default:index.html.twig', ['films' => $films]);
    }

    /*public function indexByDecadeAction($decade1, $decade2)
    {
        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository("homeBundle:Film")->findBy(
            array('dateSortie' => $decade1),
            array('dateSortie' => $decade2),
            array('creationTimestamp' => 'DESC'));

        return $this->render('frontBundle:Default:index.html.twig', ['films' => $films]);
    }*/


}

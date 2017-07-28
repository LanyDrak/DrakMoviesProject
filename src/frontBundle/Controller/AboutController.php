<?php

namespace frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository("homeBundle:Film")->allFilmsbyDate();

        return $this->render('frontBundle:MatVersion:aboutMat.html.twig', ['films' => $films]);
    }
}
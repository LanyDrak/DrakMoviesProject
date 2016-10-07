<?php

namespace frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository("homeBundle:Film")->allFilmsbyDate();

        return $this->render('frontBundle:Default:news.html.twig', ['films' => $films]);
    }
}
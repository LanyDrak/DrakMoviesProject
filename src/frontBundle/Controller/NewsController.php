<?php

namespace frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type as Type;

class NewsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $newInfos = $em->getRepository("homeBundle:NewInfo")->findAll();

        return $this->render('frontBundle:MatVersion:newsMat.html.twig', ['newInfos' => $newInfos]);
        
    }

}
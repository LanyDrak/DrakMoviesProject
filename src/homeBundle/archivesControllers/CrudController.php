<?php

namespace homeBundle\Controller;

use homeBundle\Entity\Categroy;
use homeBundle\Entity\Reduction;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\DateTime;

class CrudController extends Controller
{
    public function createAction()
    {
        $category = new Categroy();
        $category->setName('Category Numéro 1');
        $category->setDescription('Description utile !');

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->flush();

        return new Response('Catégorie enregistrée avec l\' id'.$category->getId());
    }

    public function createReductionAction()
    {
        $reduction = new Reduction();
        $reduction->setName('Giga Solde');
        $reduction->setValue(10.25);

        $reduction->setDateStart(new \DateTime("2016-04-13"));

        $reduction->setDateEnd(new \DateTime("2016-04-14"));

        $em = $this->getDoctrine()->getManager();
        $em->persist($reduction);
        $em->flush();

        return new Response('En exclusivité profitez de la réduction '.$reduction->getName().' '.$reduction->getId().' titanesque de '.$reduction->getValue().'€ du '.$reduction->getDateStart().' au '.$reduction->getDateEnd());
    }
}
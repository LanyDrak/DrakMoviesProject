<?php

namespace homeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Symfony\Component\HttpFoundation\Request;
use homeBundle\Entity\Asterix;

class AsterixController extends Controller
{
    public function indexAction(Request $request)
    {
        $asterix = new Asterix();
        $formAsterix = $this->createFormBuilder($asterix)
            ->add('nom', 'text')
            ->add('email', 'text')
            ->add('message', 'text')
            ->getForm();

        if ($request->getMethod() == "POST"){
            $formAsterix->bind($request);

            if ($formAsterix->isValid()){
                echo "Le formulaire est valide!";
            }
        }
        return $this->render('homeBundle:Contact:asterix.html.twig', ['formAsterix' => $formAsterix->createView()
    ]);
    }

}
<?php

namespace homeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    public function contactAction(Request $request)
    {
        $formContact = $this->createFormBuilder()
                            ->add('firstname', Type\TextType::class, ['data'=>'LanyDrak'])
                            ->add('email', Type\EmailType::class )
                            ->add('message_perso', Type\TextareaType::class)
                            ->add('Send', Type\SubmitType::class)
                            ->getForm();

        $formContact->handleRequest($request);

        if ($formContact->isValid())
        {
            $firstName = $formContact->get('firstname')->getData();
            $email = $formContact->get('email')->getData();
            $messagePerso = $formContact->get('message_perso')->getData();

            $message = \Swift_Message::newInstance()
                ->setSubject('To do ASAP !')
                ->setFrom('lebron.james@cleveland-cavaliers.com')
                ->setTo('aaaat@example.com')
                ->setBody(
                    $this->renderView('homeBundle:Default:mail.html.twig', ['firstname' => $firstName,
                                                                            'email' => $email,
                                                                            'message_perso' => $messagePerso]),
                    'text/html'
                )
                ->addPart(
                    $this->renderView('homeBundle:Default:mail.txt.twig', ['firstname' => $firstName,
                                                                            'email' => $email,
                                                                            'message_perso' => $messagePerso]),
                    'text/plain'
        );

            $this->get('mailer')->send($message);

            $session = $request->getSession();
            $session->getFlashBag()->add('success_mail', 'Votre email a bien été envoyé ');
            return $this->redirectToRoute('contact_homepage');
        }

        return $this->render('homeBundle:Contact:index.html.twig', ['formContact' => $formContact->createView()
                                                                    ]);
    }
}
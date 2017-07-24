<?php

namespace frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Symfony\Component\HttpFoundation\Request;
use homeBundle\Entity\Feedback;

class ContactController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository("homeBundle:Film")->allFilmsbyDate();

        return $this->render('frontBundle:Default:contact.html.twig', ['films' => $films]);
    }

    public function feedbackAction(Request $request)
    {
        $feedback = new Feedback();
        $formFeedback = $this->createFormBuilder($feedback)
            ->add('lastname', Type\TextType::class)
            ->add('firstname', Type\TextType::class)
            ->add('select', Type\ChoiceType::class, array(
                'choices'  => array(
                    0 => 'Suggestion',
                    1 => 'Commentaire',
                    2 => 'Candidature',
                    3 => 'Insultes'
                )
            ))
            ->add('email', Type\EmailType::class )
            ->add('message_perso', Type\TextareaType::class)
            ->add('Send', Type\SubmitType::class)
            ->getForm();

        $formFeedback->handleRequest($request);

        if ($formFeedback->isValid())
        {
            $lastName = $formFeedback->get('lastname')->getData();
            $firstName = $formFeedback->get('firstname')->getData();
            $select = $formFeedback->get('select')->getData();
            $email = $formFeedback->get('email')->getData();
            $messagePerso = $formFeedback->get('message_perso')->getData();

            $message = \Swift_Message::newInstance()
                ->setSubject('To do ASAP !')
                ->setFrom('lebron.james@cleveland-cavaliers.com')
                ->setTo('aaaat@example.com')
                ->setBody(
                    $this->renderView('homeBundle:Default:mail.html.twig', ['firstname' => $firstName,
                        'lastname' => $lastName,
                        'select' => $select,
                        'email' => $email,
                        'message_perso' => $messagePerso,
                        'newsletter'=> $newsletter]),
                    'text/html'
                )
                ->addPart(
                    $this->renderView('homeBundle:Default:mail.txt.twig', ['firstname' => $firstName,
                        'lastname' => $lastName,
                        'select' => $select,
                        'email' => $email,
                        'message_perso' => $messagePerso,
                        'newsletter'=> $newsletter]),
                    'text/plain'
                )
            ;

            $this->get('mailer')->send($message);

            /*$session = $request->getSession();
            $session->getFlashBag()->add('success_mail', 'Votre message a bien été envoyé ');
            return $this->redirectToRoute('contact_page');*/
        }

        return $this->render('frontBundle:Default:contact.html.twig', ['formFeedback' => $formFeedback->createView()
        ]);
    }
}
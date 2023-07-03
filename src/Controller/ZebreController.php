<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ZebreController extends AbstractController
{
    #[Route('/zebre', name: 'app_zebre')]
    public function index(Request $request, MailerInterface $mailer): Response
    
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            $address = $data['email'];
            $content = $data['content'];

            $email = (new Email())
                ->from($address)
                ->to('libois-nicolas@hotmail.fr')
                ->subject('demande de contact site web')
                ->text($content);

            $mailer->send($email);
        }
        return $this->render('zebre/index.html.twig', [
            'controller_name' => 'ZebreController',
            'formulaire' => $form->createView()
        ]);
    }
}

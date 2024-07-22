<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MySpaceController extends AbstractController
{
    #[Route('/myspace', name: 'app_myspace')]
    public function index(): Response
    {
        $userName = ucfirst($this->getUser()->getName());
        $userFirstname = ucfirst($this->getUser()->getFirstName());
        $userEmail = $this->getUser()->getEmail();
        // $userEmailVerifier = $this->getUser()->isVerified();

        return $this->render('my_space/index.html.twig', [
            "name" => $userName,
            "firstname" => $userFirstname,
            "email" => $userEmail,
            // "verified" => $userEmailVerifier
        ]);
    }
}

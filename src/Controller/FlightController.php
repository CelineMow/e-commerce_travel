<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FlightController extends AbstractController
{
    #[Route('/flight', name: 'app_flight')]
    public function index(): Response
    {
        return $this->render('flight/index.html.twig', [
            'controller_name' => 'FlightController',
        ]);
    }
}

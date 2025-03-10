<?php

namespace MPCoreBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    #[Route('/home', name: 'mp_first')]
    public function index(): Response
    {
        return new Response('Hello from CoreBundle Controller!');
    }
}
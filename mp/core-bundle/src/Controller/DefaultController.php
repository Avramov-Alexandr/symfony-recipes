<?php

namespace MP\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    #[Route('/home', name: 'core_home')]
    public function index(): Response
    {
        dd('Controller loaded');
        return new Response('Hello from CoreBundle Controller!');
    }
}

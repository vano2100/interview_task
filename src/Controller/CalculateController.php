<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CalculateController extends AbstractController
{
    /**
     * @Route("/calculate", name="calculate")
     */
    public function index()
    {
        return $this->render('calculate/index.html.twig', [
            'controller_name' => 'CalculateController',
        ]);
    }
}

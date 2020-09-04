<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Emp;
use App\Entity\Employe;
use App\Form\EmpType;
use App\Service\CostCalculator;

class CalculateController extends AbstractController
{
    /**
     * @Route("/calculate", name="calculate")
     */
    public function index(Request $request,ValidatorInterface $validator, CostCalculator $costCalculator)
    {
        $emp = new Employe();

        $form = $this->createForm(EmpType::class, $emp);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $emp = $form->getData();
            $emp->setSalary($costCalculator->calculate($emp->getSalary()));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($emp);
            $entityManager->flush();
            //$errors = $validator->validate($emp);
            $form = $this->createForm(EmpType::class, $emp);

            return $this->render('calculate/index.html.twig',['form' => $form->createView(),
            ]);
        }

        return $this->render('calculate/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}

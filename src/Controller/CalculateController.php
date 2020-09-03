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

class CalculateController extends AbstractController
{
    /**
     * @Route("/calculate", name="calculate")
     */
    public function index(Request $request,ValidatorInterface $validator)
    {
        $emp = new Emp();

        $form = $this->createForm(EmpType::class, $emp);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $emp = $form->getData();
            $empDB = new Employe();
            $entityManager = $this->getDoctrine()->getManager();
            $empDB->setName($emp->getName());
            $empDB->setSalary($emp->getSalary());
            $empDB->setMortgage($emp->getMortgage());
            $entityManager->persist($empDB);
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

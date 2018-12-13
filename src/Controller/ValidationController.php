<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Entity\Enregistre;
use App\Form\EnregistreType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ValidationController extends Controller
{
    /**
     * @Route("/validation/{id}/", name="validation")
     */
    public function index(Request $resquest, $id)
    {
        //$employe = new Employe();
        $enr = new Enregistre();

        $em = $this->getDoctrine()->getRepository(Employe::class);
        $employe = $em->find($id);
        $enr->setEmploye($employe);
        $form = $this->createForm(EnregistreType::class,$enr);

        $valider = false;

        $form->handleRequest($resquest);
        if($form->isSubmitted() && $form->isValid()){
            $e = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($e);
            $em->flush();
            $valider = true;

            return $this->render('validation/index.html.twig', [
                'form' => $form->createView(),
                'valider' => $valider,
            ]);
        }
        return $this->render('validation/index.html.twig', [
            'form' => $form->createView(),
            'valider' => $valider,
        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Entity\Information;
use App\Form\EmployeType;
use App\Form\InformationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EmployeController extends Controller
{
    /**
     * @Route("/cree_compte", name="compte")
     */
    public function index(Request $resquest, UserPasswordEncoderInterface $passwordEncoder)
    {
        $employe = new Employe();
        $form = $this->createForm(EmployeType::class,$employe);
        $compte = false;

        $form->handleRequest($resquest);
        if($form->isSubmitted() && $form->isValid()){
            $password = $passwordEncoder->encodePassword($employe, $employe->getPassword());
            $employe->setPassword($password);

            $employe = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($employe);
            $em->flush();
            $compte = true;

            return $this->render('employe/index.html.twig',[
                'form' => $form->createView(),
                'compte'=>$compte,
            ]);

        }

        return $this->render('employe/index.html.twig', [
            'form' => $form->createView(),
            'compte' => $compte,
        ]);
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function profiler(Request $resquest,UserPasswordEncoderInterface $passwordEncoder){
        $employe = $this->getUser();
        $form = $this->createForm(EmployeType::class,$employe);

        $info = new Information();
        $rp = $this->getDoctrine()->getRepository(Information::class);

        $emp = $rp->findOneBy(["employer"=>$employe->getId()]);
       // dump($emp);


       if($emp == null){
           $info->setEmployer($employe);
           $form_info = $this->createForm(InformationType::class,$info);
        }else{
           $form_info = $this->createForm(InformationType::class,$emp);
       }


       //$info->setEmployer($employe);
        //$emp->setEmployer($employe);



        $form_info->handleRequest($resquest);

        $modifier = false;

        $form->handleRequest($resquest);
        if($form->isSubmitted() && $form->isValid()){
            $password = $passwordEncoder->encodePassword($employe, $employe->getPassword());
            $employe->setPassword($password);

            $employe = $form->getData();
           // dump($employe);
            $em = $this->getDoctrine()->getManager();
            $em->persist($employe);
            $em->flush();
            $modifier = true;

            return $this->render('employe/profile.html.twig',[
                'form' => $form->createView(),
                'modifier'=>$modifier,
                'form_info'=> $form_info->createView(),
            ]);

        }elseif($form_info->isSubmitted()){
            $info = $form_info->getData();
          //  dump($info);
            $em = $this->getDoctrine()->getManager();
            $em->persist($info);
            $em->flush();
            $modifier = true;

            return $this->render('employe/profile.html.twig',[
                'form' => $form->createView(),
                'modifier'=>$modifier,
                'form_info' => $form_info->createView(),
            ]);

        }

        return $this->render('employe/profile.html.twig',
            [
                'form' => $form->createView(),
                'modifier' => $modifier,
                'form_info' => $form_info->createView(),
            ]);
    }

}

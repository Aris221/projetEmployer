<?php
/**
 * Created by PhpStorm.
 * User: Aristide
 * Date: 27/07/2018
 * Time: 11:42
 */

namespace App\Controller;



use App\Entity\Departement;
use App\Entity\Employe;
use App\Entity\Enregistre;
use App\Entity\Information;
use App\Entity\Travaille;
use App\Form\DepartementType;
use App\Form\EnregistreType;
use App\Form\TravailleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class JobController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(){
       return $this->render("job/index.html.twig");
    }

    /**
     * @Route("/domestique", name="domestique")
     */
    public function employerAction(){
        return $this->render("job/espaceEmployer.html.twig");
    }

    /**
     * @Route("/rechercher", name="rechercher")
     */
    public function employeurAction(Request $request){
        $departement = new Departement();
        $travaille = new Travaille();

        $form_d = $this->createForm(DepartementType::class,$departement);
        $form = $this->createForm(TravailleType::class, $travaille);
        $travaille = null;

        //$form_e->handleRequest($request);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $travaille = $form->getData();
            //dump($travaille);

            //$departement = $this->getDoctrine()->getRepository(Departement::class);
            //$dep = $departement->findOneBy(['nonDepartement'=>$dep->getNonDepartement()]);

            //$em = $this->getDoctrine()->getRepository(Employe::class);
            //$d = $em->findByDepartement($dep->getId());

            //$em = $this->getDoctrine()->getRepository(Information::class);
            //$info = $em->findBy(['employer'=>$d]);
           // dump($info);
            $rep = $this->getDoctrine()->getRepository(Information::class);
            $info = $rep->findAll();

            return $this->render("job/employeurRecherche.html.twig",[
                'infos'=>$info,
                't'=>$travaille,
                'form' => $form->createView(),
                'form_d' => $form_d->createView(),
            ]);
        }elseif ($form_d->isSubmitted() && $form_d->isValid()){
            $dep = $form_d->getData();
            $departement = $this->getDoctrine()->getRepository(Departement::class);
            $dep = $departement->findOneBy(['nonDepartement'=>$dep->getNonDepartement()]);
            $em = $this->getDoctrine()->getRepository(Employe::class);
            $d = $em->findByDepartement($dep->getId());

            $em = $this->getDoctrine()->getRepository(Information::class);
            $info = $em->findBy(['employer'=>$d]);


            return $this->render("job/employeurRecherche.html.twig",[
                'infos'=>$info,
                't'=>$travaille,
                'form' => $form->createView(),
                'form_d' => $form_d->createView(),
            ]);

        }
        //dump($travaille);

        $rep = $this->getDoctrine()->getRepository(Information::class);
        $info = $rep->findAll();
        return $this->render("job/employeurRecherche.html.twig",[
            'infos'=>$info,
            't'=>$travaille,
            'form' => $form->createView(),
            'form_d' => $form_d->createView(),
        ]);
    }

}
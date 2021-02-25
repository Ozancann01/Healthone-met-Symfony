<?php


namespace App\Controller;

use App\Entity\Medicijnen;
use App\Form\MedicijenType;
use App\Repository\MedicijnenRepository;
use App\Entity\Patienten;
use App\Form\PatientenType;
use App\Repository\PatientenRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MedewerkerController extends AbstractController
{

    /**
     * @Route("/patienten" ,name="patienten")
     */
    public function patientenList(PatientenRepository $patientenRepository){
        $patienten=$patientenRepository->findAll();

        return $this->render('patienten/patienten.html.twig',[
            'patienten'=>$patienten]);

    }


    /**
     * @Route("/patienten/pt/new",name="patient_new")
     */
    public function patientCreate(EntityManagerInterface $em,Request $request){

        $form= $this->createForm(PatientenType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted()&&$form->isValid()){
            /** @var Patienten $patienten */
            $patienten=$form->getData();
            $em->persist($patienten);
            $em->flush();
            return $this->redirectToRoute("patienten");
        }
        return $this->render('patienten/patientCreate.html.twig',[
            'patientenForm'=>$form->createView()
        ]);

    }
    /**
     * @Route("/patienten/pt/{id}/edit",name="patient_edit")
     */

    public function editPatienten(EntityManagerInterface $em,Request $request,Patienten $patienten){
        $form=$this->createForm(PatientenType::class,$patienten);
        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()){
            /** @var Patienten $patienten */
            $patienten=$form->getData();
            $em->persist($patienten);
            $em->flush();

            return $this->redirectToRoute("patienten",[
                'id'=>$patienten->getId()
            ]);


        }
        return $this->render('patienten/patientEdit.html.twig',[
            'patientenForm'=>$form->createView()
        ]);

    }
    /**
     * @Route("/patienten/pt/{id}/delete",name="patient_delete")
     */
    public function deltePatient(Patienten $patienten,EntityManagerInterface $em){

        $patienten->getId();
        $em->remove($patienten);
        $em->flush();


        return $this->redirectToRoute("patienten");

    }

    /*Crud medicijnen*/

    /**
     * @Route ("/medicijnen" ,name="medicijnen")
     */

    public function medicijnenList(MedicijnenRepository $medicijnenRep){
        $medicijnen=$medicijnenRep->findAll();

        return $this->render('medicijnen/list.html.twig',[
            'medicijnen'=>$medicijnen]);
    }


    /**
     * @Route ("/medicijnen/md/new" , name="medicijnen_new")
     */
    public function createMedicijnen(EntityManagerInterface $em,Request $request){
        $form = $this->createForm(MedicijenType::class);



        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            /** @var Medicijnen $medicijnen */
            $medicijnen=$form->getData();


            $em->persist($medicijnen);
            $em->flush();

            $this->addFlash('success','Article Created! Knowledge is power!');

            return  $this->redirectToRoute("medicijnen");
        }

        return $this->render('medicijnen/show.html.twig',
            ['medicijnenForm'=>$form->createView()
            ]);

    }

    /**
     * @Route("/medicijnen/md/{id}/edit", name="medicijnen_edit")
     */
    public function editMedicijnen(Medicijnen $medicijnen,Request $request,EntityManagerInterface $em){

        $form=$this->createForm(MedicijenType::class,$medicijnen);


        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()){
            /** @var Medicijnen $medicijnen */
            $medicijnen=$form->getData();
            $em->persist($medicijnen);
            $em->flush();
            $this->addFlash('success', 'Article Created! Knowledge is power!');


            return $this->redirectToRoute('medicijnen', [
                'id' => $medicijnen->getId(),
            ]);
        }
        return $this->render('medicijnen/edit.html.twig', [
            'medicijnenForm' => $form->createView()
        ]);
    }

    /**
     * @Route ("/medicijnen/md/{id}/delete",name="medicijnen_delete")
     */

    public function deleteMedicijnen(Medicijnen $medicijnen,EntityManagerInterface $em):Response{

        $medicijnen->getId();
        $em->remove($medicijnen);
        $em->flush();


        return $this->redirectToRoute('medicijnen');
    }






}
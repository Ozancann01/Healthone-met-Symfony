<?php


namespace App\Controller;


use App\Entity\Recepten;
use App\Form\ReceptenType;
use App\Repository\ReceptenRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArtsController extends AbstractController
{

    /*Je wordt gestuurd naar pagina met alle recepten*/
    /**
     * @Route("/recepten",name="recepten")
     */
    public function receptenList(ReceptenRepository $receptenRepository){
        $recepten=$receptenRepository->findAll();

        return $this->render('recepten/recepten.html.twig',[
            'recepten'=>$recepten
        ]);
    }


    /*Maakt recpt aan*/

    /**
     * @Route("/recepten/rp/new",name="recepten_new")
     */
    public function createRecept(EntityManagerInterface $em,Request $request){

        $form=$this->createForm(ReceptenType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted()&&$form->isValid()){
            /** @var Recepten $recepten */
            $recepten=$form->getData();

            $em->persist($recepten);
            $em->flush();


            return  $this->redirectToRoute("recepten");
        }
        return $this->render('recepten/create.html.twig',[
           'receptForm'=>$form->createView()
        ]);

    }

    /**
     * @Route("/recepten/rp/{id}/edit",name="recept_edit")
     */
    public function editRecepten(Recepten $recepten,EntityManagerInterface $em,Request $request){
        $form=$this->createForm(ReceptenType::class,$recepten);

        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()){
            /** @var Recepten $recpten */
            $recpten=$form->getData();

            $em->persist($recpten);
            $em->flush();

            return $this->redirectToRoute('recpten',[
                'id'=>$recepten->getId()
            ]);
        }
        return $this->render('recepten/edit.html.twig',[
            'receptenForm'=>$form->createView()
        ]);

    }

    /**
     * @Route("/recepten/rp/{id}/delete",name="recept_delete")
     */
    public function deleteRecpten(Recepten $recepten,EntityManagerInterface $em):Response{
        $recepten->getId();
        $em->persist($recepten);
        $em->flush();

        return $this->redirectToRoute('recpten');

    }




}
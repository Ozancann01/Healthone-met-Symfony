<?php


namespace App\Controller;



use App\Entity\Recepten;
use App\Form\ReceptenType;
use App\Repository\ReceptenRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;





class ApothekerController extends AbstractController
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




}
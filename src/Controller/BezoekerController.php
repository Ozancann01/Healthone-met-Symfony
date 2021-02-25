<?php


namespace App\Controller;




use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BezoekerController extends AbstractController
{
    
    //zorgt er voor dat je naar home pagina kan gaan

    /**
     * @Route("/",name="home")"
     */
    public function homepage(){
        return $this->render('/home.html.twig');

    }


}

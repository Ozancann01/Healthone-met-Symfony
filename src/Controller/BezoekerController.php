<?php


namespace App\Controller;




use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BezoekerController extends AbstractController
{

    /**
     * @Route("/",name="home")"
     */
    public function homepage(){
        return $this->render('/home.html.twig');

    }


}
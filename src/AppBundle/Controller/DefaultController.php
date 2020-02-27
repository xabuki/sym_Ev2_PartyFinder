<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Discoteca;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $discos=[];
        $em = $this->getDoctrine();
       $discos = $em->getRepository(Discoteca::class)->findAllDiscotecas(); 
        
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig',array(
           'discotecas' => $discos ,
        ));
        
    }
}

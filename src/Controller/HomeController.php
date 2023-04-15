<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry; 
use App\Entity\Category;
use App\Entity\Item;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ManagerRegistry $doctrine,ManagerRegistry $doctrine2): Response
    {   
        $entityManager = $doctrine->getManager();
        
        $entityManager2 = $doctrine2->getManager();
        
        return $this->render('/Home.html.twig', [
            'controller_name' => 'HomeController',
            /* 'categories' => $categories,
            'items' => $items, */
            
            
        ]);
    }
}
